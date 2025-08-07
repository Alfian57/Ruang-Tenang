<header class="bg-primary-400 text-white p-4 flex items-center rounded-xl justify-between">
    <div class="flex items-center space-x-4">
        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="mobile-menu-btn p-2 hover:bg-primary-dark rounded md:hidden">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
        <div class="welcome-text">
            <h1 class="text-sm md:text-base font-medium">Selamat Datang</h1>
            <h2 class="text-base md:text-lg font-semibold leading-tight">{{ auth()->user()->name }}</h2>
        </div>
    </div>
    <div class="flex items-center space-x-2 md:space-x-4">
        <x-member.global-search />

        <button class="notification-icon p-2 hover:bg-primary-dark rounded cursor-pointer">
            <img src="{{ asset('assets/member-dashboard/images/notification.png') }}" alt="Notifikasi" class="w-7 h-7">
        </button>

        <!-- Profile Dropdown -->
        @include('member.components.profile-dropdown')
    </div>
</header>