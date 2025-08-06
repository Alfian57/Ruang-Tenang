<div class="bg-white p-4 rounded-3xl shadow-sm">
    <div class="flex items-center space-x-2 mb-3">
        <img src="{{ asset('assets/member-dashboard/images/ai-chat-blue.png') }}" alt="AI" class="w-7 h-7">
        <span class="text-gray-700 font-medium text-lg md:text-xl">Lanjutkan chat terakhir</span>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
        @foreach ($chatSessions as $chatSession)
            @include('member.pages.dashboard.components.last-ai-chat-item', [
                'id' => $chatSession->id,
                'title' => \Illuminate\Support\Str::limit($chatSession->title, 30),
                'subtitle' => \Illuminate\Support\Str::limit($chatSession->messages->last()->content, 40) ?? 'Tidak ada pesan sebelumnya'
            ])
        @endforeach
    </div>
</div>