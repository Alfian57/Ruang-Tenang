@extends('member.layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/member-dashboard/css/article-show.css') }}">
@endpush

@section('content')

    <div class="p-4 overflow-y-auto scroll-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-3 bg-white rounded-lg shadow-sm">
            <!-- Main Article Content -->
            <div class="lg:col-span-2 border-r border-gray-200">
                <article class="overflow-hidden">
                    <!-- Article Header -->
                    <div class="px-6 pt-6">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
                            {{ $article->title }}
                        </h1>
                        <div class="flex items-center text-sm text-gray-600 mb-6">
                            <span class="font-medium">{{ $article->category->name }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('j F Y') }}</span>
                        </div>
                    </div>

                    <div class="px-6 mb-6">
                        <div
                            class="relative rounded-lg overflow-hidden h-94 md:h-110">
                            <img src="{{ asset($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover" />
                        </div>
                    </div>

                    <div class="px-6 pb-6 article-content text-blue-dark font-medium leading-relaxed">
                        {!! $article->content !!}
                    </div>
                </article>
            </div>

            <div class="lg:col-span-1">
                <div class=" p-6">

                    <h2 class="text-lg font-bold text-gray-900">Artikel Terkait</h2>

                    <div class="space-y-6 border-t border-gray-200 mt-4 pt-4">
                        @foreach ($relatedArticles as $article)
                            <div class="flex items-center gap-4 cursor-pointer">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset($article->thumbnail) }}" alt="{{ $article->title }}"
                                    class="w-16 h-16 rounded-lg  object-cover" />
                                </div>
                                <div class="flex-1 min-w-0">
                                    <a href="{{ route('member.articles.show', $article->id) }}" class="font-semibold text-gray-900 text-sm leading-tight mb-2 hover:text-primary-400">
                                        {{ $article->title }}
                                    </a>
                                    <p class="text-xs text-gray-600">
                                        Kategori • {{ $article->category->name }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection