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
}
