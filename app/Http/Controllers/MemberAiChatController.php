<?php

namespace App\Http\Controllers;

use App\Models\ChatSession;

class MemberAiChatController extends Controller
{
    public function index()
    {
        return view('member.pages.ai-chat.index', [
            'title' => 'AI Chat',
        ]);
    }

    public function show(ChatSession $chatSession)
    {
        return view('member.pages.ai-chat.index', [
            'title' => 'AI Chat',
            'chatSession' => $chatSession,
        ]);
    }

    public function destroy(ChatSession $chatSession)
    {
        if ($chatSession->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $chatSession->delete();

        toast('Chat berhasil dihapus.', 'success');

        return redirect()->back();
    }

    public function bookmark(ChatSession $chatSession)
    {
        if ($chatSession->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $chatSession->update(['is_bookmarked' => true]);

        toast('Chat berhasil ditandai.', 'success');

        return redirect()->back();
    }

    public function favourite(ChatSession $chatSession)
    {
        if ($chatSession->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $chatSession->update(['is_favorite' => true]);

        toast('Chat berhasil menjadi favorit.', 'success');

        return redirect()->back();
    }
}
