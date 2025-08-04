@extends('member.layouts.main')

@section('content')
    <!-- Header -->
    @include('member.pages.ai-chat.components.page-header')

    <!-- Chat Area -->
    <div class="flex-1 flex">
        <!-- Messages -->
        <div class="flex-1 flex flex-col">
            <div id="chat-messages" class="flex-1 p-4 overflow-y-auto chat-scroll space-y-4">

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
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center space-x-2">
                        <input type="text" placeholder="Kirim Pesan ke AI Chat..."
                        class="flex-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-400 focus:border-transparent"
                        id="message-input">
                        <button id="send-button"
                            class="bg-primary-400 text-white p-3 rounded-lg hover:bg-primary-dark transition-colors">
                            <img src="{{ asset('assets/member-dashboard/images/send.png') }}" alt="Kirim" class="w-5 h-5">
                        </button>
                    </div>
                </div>
            </div>

            @include('member.components.right-sidebar')
        </div>
    </div>
@endsection