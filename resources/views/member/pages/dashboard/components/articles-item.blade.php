@props([
    'background' => 'assets/member-dashboard/images/dummy-article-1.png',
    'title' => '',
    'url' => '#'
])

<div class="article-card aspect-square p-4 rounded-2xl flex flex-col justify-between"
    style="background: url('{{ asset($background) }}') no-repeat center center; background-size: cover;">
    <div
        class="text-xs bg-white opacity-75 rounded px-2 py-1 inline-flex items-center justify-center mb-3 w-auto max-w-max">
        <img src="{{ asset('assets/member-dashboard/images/article.png') }}" alt="Article Icon"
            class="inline-block mr-1 h-4 w-4">
        <span>Artikel</span>
    </div>
    <div>
        <h4 class="font-semibold text-white text-base mb-2">{{ $title }}</h4>
        <div class="flex justify-end mt-4">
            <a href="{{ $url }}" class="text-medium text-sm text-white hover:text-primary-dark">Baca Selengkapnya →</a>
        </div>
    </div>
</div>