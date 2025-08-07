@push('scripts')
    <script>
        // Profile dropdown functionality
        document.addEventListener('DOMContentLoaded', function () {
            const profileBtn = document.getElementById('profile-dropdown-btn');
            const profileMenu = document.getElementById('profile-dropdown-menu');

            // Toggle dropdown when profile button is clicked
            profileBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                profileMenu.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (e) {
                if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                    profileMenu.classList.add('hidden');
                }
            });

            // Close dropdown when pressing Escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    profileMenu.classList.add('hidden');
                }
            });
        });
    </script>
@endpush

<div class="relative">
    <button id="profile-dropdown-btn"
        class="w-10 h-10 bg-opacity-20 rounded-full overflow-hidden flex items-center justify-center cursor-pointer hover:bg-primary-dark transition-colors">
        <img src="{{ asset('assets/member-dashboard/images/dummy-profile.png') }}" alt="Profile"
            class="w-full h-full object-cover">
    </button>

    <!-- Dropdown Menu -->
    <div id="profile-dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border hidden z-50">
        <div class="py-2">
            <a href="{{ route('member.profile.index') }}"
                class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-100 transition-colors">
                <img src="{{ asset("assets/member-dashboard/images/setting.png") }}" alt="Pengaturan" icon"
                    class="w-4 h-4 mr-3" />
                <span class="text-sm">Pengaturan</span>
            </a>
            <hr class="my-1 border-gray-200">
            <div>
                <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf
                </form>

                <!-- Logout button that triggers modal -->
                <button type="button" onclick="showLogoutModal()"
                    class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 text-gray-700 w-full text-left cursor-pointer">
                    <img src="{{ asset("assets/member-dashboard/images/logout.png") }}" alt="Keluar" class="w-5 h-5" />
                    <span class="nav-text">Keluar</span>
                </button>
            </div>
        </div>
    </div>
</div>