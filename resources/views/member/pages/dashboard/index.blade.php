@extends('member.layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset("assets/member-dashboard/css/dashboard.css") }}">
@endpush

@push('scripts')
    {{-- --}}
@endpush

@section('content')
    <div class="flex gap-6 p-4 overflow-y-auto">
        <div class="flex-1">
            @include('member.pages.dashboard.components.main-banner')
            @include('member.pages.dashboard.components.chat-and-mood-section')
            @include('member.pages.dashboard.components.emotion-chart-and-music')
            @include('member.pages.dashboard.components.articles')
        </div>
    </div>
@endsection