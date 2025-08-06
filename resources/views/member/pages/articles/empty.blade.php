@extends('member.layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/member-dashboard/css/article-empty.css') }}">
@endpush

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full text-center fade-in">
            <!-- Empty State Illustration -->
            <div class="mb-8 empty-illustration">
                <div class="w-32 h-32 mx-auto bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Main Message -->
            <div class="mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                    Belum Ada Artikel
                </h1>
                <p class="text-gray-600 text-base leading-relaxed mb-2">
                    Maaf, saat ini belum ada artikel yang tersedia.
                </p>
                <p class="text-gray-500 text-sm">
                    Silakan kembali lagi nanti untuk membaca artikel terbaru tentang kesehatan mental.
                </p>
            </div>
        </div>
    </div>
@endsection