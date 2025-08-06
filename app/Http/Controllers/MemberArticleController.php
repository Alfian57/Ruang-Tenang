<?php

namespace App\Http\Controllers;

use App\Models\Article;

class MemberArticleController extends Controller
{
    public function index()
    {
        $article = Article::latest()->first();

        if ($article) {
            return redirect()->route('member.articles.show', $article);
        }

        return view('member.pages.articles.empty', [
            'title' => 'Artikel Kosong',
        ]);
    }

    public function show(Article $article)
    {
        return view('member.pages.articles.show', [
            'title' => 'Artikel',
            'article' => $article,
            'relatedArticles' => Article::where('id', '!=', $article->id)->latest()->with('category')->take(6)->get(),
        ]);
    }
}
