@extends('member.layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset("assets/member-dashboard/css/ai-chat.css") }}">
@endpush

@push('scripts')
    <script>
        // Message sending functionality
        const chatMessages = document.getElementById('chat-messages');
        // Auto-scroll to bottom on page load
        chatMessages.scrollTop = chatMessages.scrollHeight;
    </script>
@endpush

@section('content')
    <!-- Chat Area -->
    <div class="p-4 h-full">
        <div class="flex-1 flex relative h-full bg-white rounded-3xl shadow-sm">
            <!-- Messages -->
            @include('member.pages.ai-chat.components.ai-chat-area')

           <x-member.right-sidebar />
        </div>
    </div>
@endsection