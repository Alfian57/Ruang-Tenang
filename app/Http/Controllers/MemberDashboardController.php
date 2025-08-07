<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SongCategory;

class MemberDashboardController extends Controller
{
    public function index()
    {
        return view('member.pages.dashboard.index', [
            'title' => 'Dashboard',
            'articles' => Article::latest()->take(5)->get(),
            'songCategories' => SongCategory::latest()->with('songs')->withCount('songs')->orderBy('songs_count', 'DESC')->take(4)->get(),
            'chatSessions' => auth()->user()->chatSessions()->with('messages')->latest()->take(6)->get(),
        ]);
    }
}
