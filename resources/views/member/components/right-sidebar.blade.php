<div id="right-sidebar"
    class="w-80 md:w-80 lg:tablet-right-sidebar bg-white border-l border-gray-200 p-4 hidden md:flex right-sidebar-mobile flex-col h-full">
    <!-- Mobile Close Button -->
    <div class="flex items-center justify-between mb-4 md:hidden">
        <h3 class="font-semibold text-gray-800">Menu</h3>
        <button id="close-right-sidebar" class="p-2 hover:bg-gray-100 rounded">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-gray-800">Pesan ({{ $chatSessionCount }})</h3>
    </div>

    <div class="flex flex-col flex-1 space-y-3 overflow-hidden">
        <a
            href="{{ route('member.ai-chat.index', request()->query()) }}"
            class="w-full bg-gray-800 text-white p-3 rounded-lg flex items-center justify-center space-x-2 hover:bg-gray-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            <span>Buat Obrolan Baru</span>
        </a>

        <div class="space-y-2">
            @include('member.components.right-sidebar-item', [
                'filter' => App\Enums\ChatSessionFilterEnum::ALL->value,
                'icon' => 'assets/member-dashboard/images/history.png',
                'label' => 'Riwayat',
                'count' => $chatSessionCount,
            ])

            @include('member.components.right-sidebar-item', [
                'filter' => App\Enums\ChatSessionFilterEnum::FAVORITED->value,
                'icon' => 'assets/member-dashboard/images/favorite.png',
                'label' => 'Favorit',
                'count' => $favoriteChatSessionCount,
            ])

            @include('member.components.right-sidebar-item', [
                'filter' => App\Enums\ChatSessionFilterEnum::BOOKMARKED->value,
                'icon' => 'assets/member-dashboard/images/bookmark.png',
                'label' => 'Ditandai',
                'count' => $bookmarkChatSessionCount,
            ])

            @include('member.components.right-sidebar-item', [
                'filter' => App\Enums\ChatSessionFilterEnum::DELETED->value,
                'icon' => 'assets/member-dashboard/images/trash.png',
                'label' => 'Sampah',
                'count' => $deletedChatSessionCount,
            ])
        </div>

        <div class="pt-4 border-t border-gray-200">
            <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-800">
                <span class="text-sm">Riwayat</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>

        <div class="flex-1 overflow-hidden min-h-0">
            <div class="space-y-2 text-sm max-h-106 overflow-y-auto pb-2">
                @forelse ($chatSessions as $chatSession)
                    <div class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg cursor-pointer flex justify-between items-center space-x-3 border border-gray-200">
                        <a href="{{ route('member.ai-chat.show', array_merge(['chatSession' => $chatSession->id], request()->query())) }}">
                            <div class="font-medium text-gray-800">{{ \Illuminate\Support\Str::limit($chatSession->title, 25) }}</div>
                            <div class="text-xs text-gray-500">
                                {{ optional($chatSession->messages->last())->content ? \Illuminate\Support\Str::limit($chatSession->messages->last()->content, 40) : 'Tidak ada pesan sebelumnya' }}
                            </div>
                        </a>
                        <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="Lainnya" class="w-5 h-5">
                    </div>
                @empty
                    <div class="p-3 rounded-lg text-center text-gray-500">
                        Tidak ada obrolan yang ditemukan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>