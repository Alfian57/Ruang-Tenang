<header class="bg-primary-400 text-white p-4 flex items-center rounded-xl justify-between">
    <div class="flex items-center space-x-4">
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="mobile-menu-btn p-2 hover:bg-primary-dark rounded md:hidden">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
        <div>
            <h1 class="text-sm md:text-base font-medium">Selamat Datang</h1>
            <h2 class="text-base md:text-lg font-semibold leading-tight">{{ auth()->user()->name }}</h2>
        </div>
    </div>
    <div class="flex items-center space-x-2 md:space-x-4">
        <!-- Desktop Search -->
        <div class="desktop-search justify-between items-center bg-primary-700 bg-opacity-20 rounded-full px-2"
            style="min-width: 400px;">
            <input type="text" placeholder="Cari sesuatu"
                class="text-sm text-white placeholder-white focus:outline-none px-2 py-1" />
            <button class="p-2 hover:bg-primary-dark rounded">
                <img src="{{ asset('assets/member-dashboard/images/search.png') }}" alt="Cari" class="w-6 h-6">
            </button>
        </div>

        <!-- Mobile Search -->
        <button class="mobile-search md:hidden p-2 hover:bg-primary-dark rounded">
            <img src="{{ asset('assets/member-dashboard/images/search.png') }}" alt="Cari" class="w-6 h-6">
        </button>

        <!-- Mobile Right Sidebar Toggle -->
        <button id="mobile-right-sidebar-btn" class="md:hidden p-2 hover:bg-primary-dark rounded">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                </path>
            </svg>
        </button>

        <button class="p-2 hover:bg-primary-dark rounded cursor-pointer">
            <img src="{{ asset('assets/member-dashboard/images/notification.png') }}" alt="Notifikasi" class="w-7 h-7">
        </button>
        <div class="w-10 h-10 bg-opacity-20 rounded-full overflow-hidden flex items-center justify-center cursor-pointer">
            <img src="{{ asset('assets/member-dashboard/images/dummy-profile.png') }}" alt="Profile"
                class="w-full h-full object-cover">
        </div>
    </div>
</header>