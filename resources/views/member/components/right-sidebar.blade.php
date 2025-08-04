<div class="w-80 bg-white border-l border-gray-200 p-4">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-gray-800">Pesan (12)</h3>
    </div>

    <div class="space-y-3">
        <button
            class="w-full bg-gray-800 text-white p-3 rounded-lg flex items-center justify-center space-x-2 hover:bg-gray-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            <span>Buat Obrolan Baru</span>
        </button>

        <div class="space-y-2">
            @include('member.components.right-sidebar-item', [
                'href' => '#',
                'icon' => 'assets/member-dashboard/images/history.png',
                'label' => 'Riwayat',
                'count' => 12,
                'isActive' => true,
            ])

            @include('member.components.right-sidebar-item', [
                'href' => '#',
                'icon' => 'assets/member-dashboard/images/favorite.png',
                'label' => 'Favorit',
                'count' => 5,
            ])

            @include('member.components.right-sidebar-item', [
                'href' => '#',
                'icon' => 'assets/member-dashboard/images/bookmark.png',
                'label' => 'Ditandai',
            ])

            @include('member.components.right-sidebar-item', [
                'href' => '#',
                'icon' => 'assets/member-dashboard/images/trash.png',
                'label' => 'Sampah',
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

        <div class="space-y-2 text-sm">
            <div class="p-2 hover:bg-gray-100 rounded cursor-pointer flex justify-between items-center space-x-3">
                <div class="">
                    <div class="font-medium text-gray-800">Kehilangan Motivasi...</div>
                    <div class="text-xs text-gray-500">menyangkut kehilangan</div>
                </div>
                <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="Lainnya" class="w-5 h-5">
            </div>

            <div class="p-2 hover:bg-gray-100 rounded cursor-pointer flex justify-between items-center space-x-3">
                <div class="">
                    <div class="font-medium text-gray-800">Overthinking & Cemas</div>
                    <div class="text-xs text-gray-500">Aku sering overthinking</div>
                </div>
                <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="Lainnya" class="w-5 h-5">
            </div>

            <div class="p-2 hover:bg-gray-100 rounded cursor-pointer flex justify-between items-center space-x-3">
                <div class="">
                    <div class="font-medium text-gray-800">Stres Karena Tugas</div>
                    <div class="text-xs text-gray-500">Aku sering stres karena tugas</div>
                </div>
                <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="Lainnya" class="w-5 h-5">
            </div>

            <div class="p-2 hover:bg-gray-100 rounded cursor-pointer flex justify-between items-center space-x-3">
                <div class="">
                    <div class="font-medium text-gray-800">Burnout Menjelang UTS</div>
                    <div class="text-xs text-gray-500">Aku merasa burnout</div>
                </div>
                <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="Lainnya" class="w-5 h-5">
            </div>

            <div class="p-2 hover:bg-gray-100 rounded cursor-pointer flex justify-between items-center space-x-3">
                <div class="">
                    <div class="font-medium text-gray-800">Rasa Tidak Percaya Diri</div>
                    <div class="text-xs text-gray-500">Aku merasa minder dengan</div>
                </div>
                <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="Lainnya" class="w-5 h-5">
            </div>
        </div>
    </div>
</div>