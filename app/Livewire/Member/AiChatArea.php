<?php

namespace App\Livewire\Member;

use App\Enums\ChatRoleEnum;
use App\Helper\GeminiClient;
use App\Models\ChatMessage;
use App\Models\ChatSession;
use Illuminate\Support\Str;
use Livewire\Component;

class AiChatArea extends Component
{
    public ?ChatSession $chatSession = null;

    private ?GeminiClient $geminiClient = null;

    public string $message = '';

    public bool $isLoading = false;

    public ?string $pendingMessage = null;

    private bool $isProcessing = false;

    public function mount()
    {
        // Restore loading state setelah redirect (untuk new session)
        $loadingState = session()->pull('ai_loading_state');
        if ($loadingState &&
            $this->chatSession &&
            $this->chatSession->id == $loadingState['chat_session_id']) {

            $this->isLoading = $loadingState['is_loading'];
            $this->pendingMessage = $loadingState['pending_message'];

            // Trigger AI response dengan delay
            $this->dispatch('trigger-ai-response');
        }

        // Dispatch scroll to bottom
        if ($this->chatSession && $this->chatSession->messages->count() > 0) {
            $this->dispatch('scrollToBottom');
        }
    }

    private function getGeminiClient(): GeminiClient
    {
        if ($this->geminiClient === null) {
            $this->geminiClient = new GeminiClient;
        }

        return $this->geminiClient;
    }

    public function render()
    {
        // Refresh relationship untuk memastikan data terbaru
        if ($this->chatSession) {
            $this->chatSession->refresh();
            $messages = $this->chatSession->messages()->orderBy('created_at', 'asc')->get();
        } else {
            $messages = null;
        }

        return view('member.pages.ai-chat.components.ai-chat-area', [
            'messages' => $messages,
        ]);
    }

    public function sendMessage()
    {
        if (trim($this->message) === '') {
            return;
        }

        $isNewSessionChat = $this->chatSession === null;
        if ($isNewSessionChat) {
            $this->chatSession = ChatSession::create([
                'title' => Str::limit($this->message, 25),
                'user_id' => auth()->id(),
            ]);
        }

        // Store the message content
        $messageContent = $this->message;

        ChatMessage::create([
            'chat_session_id' => $this->chatSession->id,
            'role' => ChatRoleEnum::USER->value,
            'content' => $messageContent,
        ]);

        // Set loading state and store pending message
        $this->isLoading = true;
        $this->pendingMessage = $messageContent;

        // Reset pesan input
        $this->reset('message');

        // Dispatch event untuk scroll ke bawah
        $this->dispatch('scrollToBottom');

        // Untuk session baru, redirect dengan menyimpan state di session
        if ($isNewSessionChat) {
            // Store loading state in session untuk diambil setelah redirect
            session()->put('ai_loading_state', [
                'chat_session_id' => $this->chatSession->id,
                'pending_message' => $messageContent,
                'is_loading' => true,
            ]);

            $this->redirect(route('member.ai-chat.show', array_merge(['chatSession' => $this->chatSession->id], request()->query())), navigate: true);

            return;
        }

        // Untuk session lama, trigger AI response langsung dengan delay
        $this->dispatch('trigger-ai-response');
    }

    public function generateAiResponse()
    {
        // Prevent multiple executions
        if (! $this->isLoading || ! $this->pendingMessage || $this->isProcessing) {
            return;
        }

        // Set processing flag to prevent duplicate calls
        $this->isProcessing = true;

        // Generate AI response directly with stored message content
        try {
            $response = $this->getGeminiClient()->promptWithHistory(
                prompt: $this->pendingMessage,
                history: $this->chatSession->messages()
                    ->where('created_at', '<', now()) // Exclude current message being processed
                    ->orderBy('created_at', 'asc')
                    ->get()
                    ->map(function ($message) {
                        return [
                            'message' => $message->content,
                            'role' => $message->role,
                        ];
                    })->toArray()
            );

            ChatMessage::create([
                'chat_session_id' => $this->chatSession->id,
                'role' => ChatRoleEnum::AI->value,
                'content' => $this->getGeminiClient()->filterResponse($response),
            ]);

            \Log::info('AI response generated and saved successfully');

        } catch (\Exception $e) {
            \Log::error('AI Response Error: '.$e->getMessage());
        }

        // Reset all states
        $this->isLoading = false;
        $this->pendingMessage = null;
        $this->isProcessing = false;

        // Dispatch scroll lagi setelah AI response
        $this->dispatch('scrollToBottom');
    }

    public function likeMessage($messageId)
    {
        $message = ChatMessage::findOrFail($messageId);
        $message->is_liked = true;
        $message->is_disliked = false;
        $message->save();
    }

    public function dislikeMessage($messageId)
    {
        $message = ChatMessage::findOrFail($messageId);
        $message->is_disliked = true;
        $message->is_liked = false;
        $message->save();
    }
}
