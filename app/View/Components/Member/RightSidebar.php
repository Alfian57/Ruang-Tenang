<?php

namespace App\View\Components\Member;

use App\Enums\ChatSessionFilterEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RightSidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $chatSessions = auth()->user()->chatSessions()->with('messages')->latest();

        if (request()->has('filter')) {
            $filter = request()->get('filter');
            if ($filter === ChatSessionFilterEnum::BOOKMARKED->value) {
                $chatSessions->where('is_bookmarked', true);
            } elseif ($filter === ChatSessionFilterEnum::FAVORITED->value) {
                $chatSessions->where('is_favorite', true);
            } elseif ($filter === ChatSessionFilterEnum::DELETED->value) {
                $chatSessions->onlyTrashed();
            }
        }

        return view('member.components.right-sidebar', [
            'chatSessions' => $chatSessions->get(),
            'chatSessionCount' => auth()->user()->chatSessions()->count(),
            'bookmarkChatSessionCount' => auth()->user()->chatSessions()->where('is_bookmarked', true)->count(),
            'favoriteChatSessionCount' => auth()->user()->chatSessions()->where('is_favorite', true)->count(),
            'deletedChatSessionCount' => auth()->user()->chatSessions()->onlyTrashed()->count(),
        ]);
    }
}
