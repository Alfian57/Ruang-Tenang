<?php

namespace App\Livewire\Member;

use App\Enums\ChatRoleEnum;
use App\Models\ChatMessage;
use App\Models\ChatSession;
use Illuminate\Support\Str;
use Livewire\Component;

class AiChatArea extends Component
{
    public ?ChatSession $chatSession = null;

    public string $message = '';

    public function mount()
    {
        // Dispatch scroll to bottom
        if ($this->chatSession && $this->chatSession->messages->count() > 0) {
            $this->dispatch('scrollToBottom');
        }
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

        ChatMessage::create([
            'chat_session_id' => $this->chatSession->id,
            'role' => ChatRoleEnum::USER->value,
            'content' => $this->message,
        ]);

        ChatMessage::create([
            'chat_session_id' => $this->chatSession->id,
            'role' => ChatRoleEnum::AI->value,
            'content' => 'Terima kasih telah mengirim pesan. AI akan segera merespons.',
        ]);

        // Reset pesan setelah berhasil disimpan
        $this->reset('message');

        // Dispatch event untuk scroll ke bawah
        $this->dispatch('scrollToBottom');

        if ($isNewSessionChat) {
            return redirect()->route('member.ai-chat.show', array_merge(['chatSession' => $this->chatSession->id], request()->query()));
        }
    }
}
