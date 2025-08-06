@push('scripts')
    <script>
        function showLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            // Trigger animation
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.querySelector('.modal-content').classList.remove('scale-95', 'opacity-0');
            }, 10);
        }

        function hideLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.add('opacity-0');
            modal.querySelector('.modal-content').classList.add('scale-95', 'opacity-0');
            // Hide after animation
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 200);
        }

        // Event listeners
        document.getElementById('cancelLogout').addEventListener('click', hideLogoutModal);
        
        document.getElementById('confirmLogout').addEventListener('click', function() {
            document.getElementById('logoutForm').submit();
        });

        // Close modal when clicking outside
        document.getElementById('logoutModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideLogoutModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideLogoutModal();
            }
        });
    </script>
@endpush

<div id="logoutModal" class="fixed inset-0 bg-black/30 backdrop-blur-[2px] overflow-y-auto h-full w-full z-50 hidden opacity-0 transition-all duration-200 ease-out items-center justify-center p-4">
    <div class="modal-content w-full max-w-md p-6 border shadow-2xl rounded-lg bg-white/95 backdrop-blur-sm scale-95 opacity-0 transition-all duration-200 ease-out transform">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100/80 mb-4">
                <img src="{{ asset('assets/member-dashboard/images/logout-red.png') }}" alt="Logout Icon" class="h-6 w-6">
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-2">Konfirmasi Keluar</h3>
            <p class="text-sm text-gray-600 mb-6">
                Apakah Anda yakin ingin keluar dari akun Anda?
            </p>
            <div class="flex justify-center space-x-3">
                <button id="cancelLogout" type="button" class="px-4 py-2 bg-gray-200/80 text-gray-700 text-base font-medium rounded-md hover:bg-gray-300/90 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all duration-150 cursor-pointer">
                    Batal
                </button>
                <button id="confirmLogout" type="button" class="px-4 py-2 bg-red-600/90 text-white text-base font-medium rounded-md hover:bg-red-700/95 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-150 cursor-pointer">
                    Ya, Keluar
                </button>
            </div>
        </div>
    </div>
</div>