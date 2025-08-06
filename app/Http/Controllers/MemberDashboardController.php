<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Song;
use App\Models\SongCategory;
use Illuminate\Http\Request;

class MemberDashboardController extends Controller
{
    public function index()
    {
        return view('member.pages.dashboard.index', [
            'title' => 'Dashboard',
            'articles' => Article::latest()->take(5)->get(),
            'songCategories' => SongCategory::latest()->withCount('songs')->take(5)->get(),
            'chatSessions' => auth()->user()->chatSessions()->with('messages')->latest()->take(6)->get(),
        ]);
    }
}
