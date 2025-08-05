@extends('member.layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset("assets/member-dashboard/css/dashboard.css") }}">
@endpush

@section('content')
    <div class="flex gap-6 p-4 overflow-y-auto scroll-hidden">
        <div class="flex-1">
            @include('member.pages.dashboard.components.main-banner')

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1fr_3fr_2fr] gap-4 mb-6">
                @include('member.pages.dashboard.components.mood-check')
                @include('member.pages.dashboard.components.ai-chat')
                @include('member.pages.dashboard.components.breathing-exercise')
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                @include('member.pages.dashboard.components.emotion-chart')
                @include('member.pages.dashboard.components.music')
            </div>

            @include('member.pages.dashboard.components.articles')
        </div>
    </div>
@endsection