<div class="bg-white p-4 rounded-3xl shadow-sm">
    <div class="flex items-center space-x-2 mb-3">
        <img src="{{ asset('assets/member-dashboard/images/ai-chat-blue.png') }}" alt="AI" class="w-7 h-7">
        <span class="text-gray-700 font-medium text-lg md:text-xl">Lanjutkan chat terakhir</span>
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