<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberAiChatController extends Controller
{
    public function index()
    {
        return view('member.pages.ai-chat.index', [
            'title' => 'AI Chat',
        ]);
    }
}
