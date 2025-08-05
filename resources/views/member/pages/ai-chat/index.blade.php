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
    <div class="flex-1 flex relative">
        <!-- Messages -->
        <div class="flex-1 flex flex-col min-w-0 h-full">
            <div id="chat-messages" class="flex-1 p-2 md:p-4 overflow-y-auto chat-scroll space-y-4"
                style="max-height: 85vh;">

                @include('member.pages.ai-chat.components.user-chat', [
                    'text' => 'Halo, aku ingin meminta saran tentang cara mengatasi kecemasan dengan pesan terkait. Aku pernah mengalami kecemasan dengan pesan terkait, tolong dan berikan kepada saya cara mengatasi kecemasan atau cara mengatasi kecemasan.',
                    'time' => 'July 31 at 2:00 PM',
                    'avatar' => "assets/member-dashboard/images/dummy-profile.png",
                ])

        @include('member.pages.ai-chat.components.user-chat', [
            'text' => 'Aku sakit—sakit ini serang ngomong gak bermanfaat buat belajar',
            'time' => 'July 31 at 2:00 PM',
            'avatar' => "assets/member-dashboard/images/dummy-profile.png"
        ])
        
        @include('member.pages.ai-chat.components.ai-chat', [
        'text' => 'Terima kasih sudah berbagi. Perasaan ini valid dan sering terjadi saat kita menghadapi tekanan akademik. Berikut beberapa cara yang bisa kamu coba untuk mengatasi kecemasan dan meningkatkan motivasi, dan mulai dari langkah kecil yang bisa kamu lakukan hari ini:',
        'time' => 'October 1 at 2:00 PM',
    ])

                                   </div>

            <!-- Message Input -->
            <div class="p-2 md:p-4 border-t border-gray-200">
                    <div class="flex items-center space-x-2">
                    <input type="text" placeholder="Kirim Pesan ke AI Chat..."
                        class="flex-1 p-2 md:p-3 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent"
                        id="message-input">
                        <button id="send-button"
                            class="bg-primary-400 text-white p-2 md:p-3 rounded-lg hover:bg-primary-dark transition-colors">
                            <img src="{{ asset('assets/member-dashboard/images/send.png') }}" alt="Kirim" class="w-4 h-4 md:w-5 md:h-5">
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Hidden on mobile, shown on tablet/desktop -->
            @include('member.components.right-sidebar')
        </div>
@endsection