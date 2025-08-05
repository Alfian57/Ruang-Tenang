<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1fr_3fr_2fr] gap-4 mb-6">
    <!-- Mood Check -->
    <div
        class="bg-linear-to-b from-blue-400 to-blue-500 text-white flex justify-center items-center relative p-10 rounded-3xl">
        <h3 class="text-3xl text-center font-semibold mb-3">Gimana Kondisimu Hari ini?</h3>
        <div class="absolute bottom-3 right-3">
            <img src="{{ asset('assets/member-dashboard/images/smile-plus.png') }}" alt="Smile Icon"
                class="w-14 h-14 bg-linear-to-b from-blue-400 to-blue-600 rounded-xl p-2.5">
        </div>
    </div>

    <!-- AI Chat -->
    <div class="bg-white p-4 rounded-3xl shadow-sm">
        <div class="flex items-center space-x-2 mb-3">
            <img src="{{ asset('assets/member-dashboard/images/ai-chat-blue.png') }}" alt="AI" class="w-7 h-7">
            <span class="text-gray-700 font-medium text-sm">Lanjutkan chat terakhir</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
            @include('member.pages.dashboard.components.last-ai-chat-item', [
                'title' => 'Kehilangan Motivasi Belajar',
                'subtitle' => 'Ruang tenang bantu aku'
            ])

            @include('member.pages.dashboard.components.last-ai-chat-item', [
                'title' => 'Overthinking & Cemas',
                'subtitle' => 'Aku curhat soal rasa cemas'
            ])

            @include('member.pages.dashboard.components.last-ai-chat-item', [
                'title' => 'Sulit Tidur',
                'subtitle' => 'Aku sering susah tidur akhir-akhir ini'
            ])

            @include('member.pages.dashboard.components.last-ai-chat-item', [
                'title' => 'Tekanan dari Teman',
                'subtitle' => 'Aku merasa tertekan oleh lingkungan'
            ])
        </div>
    </div>

    <!-- Music Player -->
    <div class="music-player p-4 rounded-2xl">
        <h3 class="font-semibold text-gray-800 mb-2 text-sm">Atur Napasmu, Atur Tenangmu</h3>
        <div class="flex items-center mb-3">
            <div
                class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold mr-2 text-xs">
                Mulai
            </div>
            <div class="flex-1">
                <div class="space-y-1 text-xs">
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-400 rounded-full mr-2"></div>
                        <span>Tarik Nafas</span>
                        <span class="ml-auto text-gray-500">5d</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-2"></div>
                        <span>Tahan Nafas</span>
                        <span class="ml-auto text-gray-500">5d</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-2 h-2 bg-blue-800 rounded-full mr-2"></div>
                        <span>Buang Nafas</span>
                        <span class="ml-auto text-gray-500">5d</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center space-x-2">
            <button class="w-6 h-6 bg-white rounded-full flex items-center justify-center shadow">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M6 6h2v12H6zm10 0h2v12h-2z" />
                </svg>
            </button>
            <button class="w-6 h-6 bg-white rounded-full flex items-center justify-center shadow">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                </svg>
            </button>
            <button class="w-6 h-6 bg-white rounded-full flex items-center justify-center shadow">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 7h10v3l4-4-4-4v3H5v6h2V7z" />
                </svg>
            </button>
        </div>
    </div>
</div>