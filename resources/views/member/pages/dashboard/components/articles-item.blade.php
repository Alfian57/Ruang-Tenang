@props([
    'background' => 'assets/member-dashboard/images/dummy-article-1.png',
    'title' => '',
    'id' => '#'
])
@php
    if (!Str::startsWith($background, ['http://', 'https://'])) {
        $background = asset('storage/' . $background);
    }
@endphp

<div class="article-card aspect-square p-4 rounded-2xl flex flex-col justify-between relative"
    style="background: url('{{ $background }}') no-repeat center center; background-size: cover;">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-black/0 bg-opacity-40 rounded-2xl"></div>
    
    <div
        class="text-xs bg-white opacity-75 rounded px-2 py-1 inline-flex items-center justify-center mb-3 w-auto max-w-max relative z-10">
        <img src="{{ asset('assets/member-dashboard/images/article.png') }}" alt="Article Icon"
            class="inline-block mr-1 h-4 w-4">
        <span>Artikel</span>
    </div>
    
    <div class="relative z-10">
        <a href="{{ route('member.articles.show', $id) }}" class="font-semibold text-white hover:text-primary-dark text-lg md:text-xl mb-2">{{ $title }}</a>
        <div class="flex justify-end mt-4">
            <a href="{{ route('member.articles.show', $id) }}" class="text-medium text-sm text-white hover:text-primary-dark">Baca Selengkapnya →</a>
        </div>
    </div>
</div>