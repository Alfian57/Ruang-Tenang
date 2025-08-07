<?php

namespace App\View\Components\Member;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GlobalSearch extends Component
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
        return view('member.components.global-search', [
            'articles' => \App\Models\Article::select('id', 'title')->latest()->get(),
            'songs' => \App\Models\Song::select('id', 'title')->latest()->get(),
        ]);
    }
}
