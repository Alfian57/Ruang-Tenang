<header class="bg-primary-400 text-white p-4 flex items-center justify-between">
    <div class="flex items-center space-x-4">
        <h1 class="text-xl font-semibold">AI Chat</h1>
    </div>
    <div class="flex items-center space-x-4">
        <div class="flex items-center bg-primary-700 bg-opacity-20 rounded-full px-2" style="min-width: 250px;">
            <input type="text" placeholder="Cari sesuatu"
                class="bg-transparent text-sm text-white placeholder-white focus:outline-none px-2 py-1 w-full" />
            <button class="p-2 hover:bg-primary-dark rounded">
                <img src="{{ asset('assets/member-dashboard/images/search.png') }}" alt="Cari" class="w-5 h-5">
            </button>
        </div>
        <button class="p-2 hover:bg-primary-dark rounded">
            <img src="{{ asset('assets/member-dashboard/images/notification.png') }}" alt="Cari" class="w-5 h-5">
        </button>
        <div class="w-8 h-8 bg-opacity-20 rounded-full overflow-hidden flex items-center justify-center">
            <img src="{{ asset('assets/member-dashboard/images/dummy-profile.png') }}" alt="Cari"
                class="w-full h-full object-cover">
        </div>
    </div>
</header>