<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 pb-20">
    @foreach ($articles as $article)
        @include('member.pages.dashboard.components.articles-item', [
            'background' => $article->thumbnail,
            'title' => $article->title,
            'id' => $article->id
        ])
       @endforeach
</div>