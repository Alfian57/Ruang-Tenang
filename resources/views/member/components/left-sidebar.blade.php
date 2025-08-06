<div id="sidebar" class="bg-white border-r border-gray-200 transition-all duration-300 sidebar-expanded flex flex-col md:relative md:translate-x-0">
    <!-- Logo and Toggle -->
    <div class="p-4 border-b border-gray-200 flex items-center justify-between space-x-2">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" id="logo-img" class="w-8 h-8 rounded cursor-pointer">
            <span id="logo-text" class="font-medium text-lg text-primary-400 leading-none">Ruang<br>Tenang</span>
        </div>
        <button id="toggle-sidebar" class="p-1 hover:bg-gray-100 rounded">
            <img src="{{ asset("assets/member-dashboard/images/sidebar-toggle.png") }}" alt="Toogle"
                class="w-6 h-6 cursor-pointer" />
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-2">
        @include('member.components.left-sidebar-item', [
            'href' => route('member.dashboard'),
            'icon' => 'assets/member-dashboard/images/home.png',
            'activeIcon' => 'assets/member-dashboard/images/home-active.png',
            'label' => "Beranda",
            'count' => null,
        ])

        @include('member.components.left-sidebar-item', [
            'href' => '#',
            'icon' => 'assets/member-dashboard/images/article.png',
            'activeIcon' => 'assets/member-dashboard/images/article-active.png',
            'label' => "Artikel",
            'count' => $articleCount,
        ])

        @include('member.components.left-sidebar-item', [
            'href' => route('member.ai-chat'),
            'icon' => 'assets/member-dashboard/images/ai-chat.png',
            'activeIcon' => 'assets/member-dashboard/images/ai-chat-active.png',
            'label' => "AI Chat",
            'count' => 12,
        ])
    </nav>

    <!-- Bottom Navigation -->
    <div class="p-4 border-t border-gray-200 space-y-2">
        <a href="#" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 text-gray-700">
            <img src="{{ asset("assets/member-dashboard/images/setting.png") }}" alt="Pengaturan" icon" class="w-5 h-5" />
            <span class="nav-text">Pengaturan</span>
        </a>

        <div>
            <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>

            <!-- Logout button that triggers modal -->
            <button type="button" onclick="showLogoutModal()" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 text-gray-700 w-full text-left cursor-pointer">
                <img src="{{ asset("assets/member-dashboard/images/logout.png") }}" alt="Keluar" class="w-5 h-5" />
                <span class="nav-text">Keluar</span>
            </button>
        </div>
    </div>
</div>