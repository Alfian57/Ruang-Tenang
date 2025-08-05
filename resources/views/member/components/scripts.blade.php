<script>
    // Sidebar toggle functionality
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggle-sidebar');
    const logoText = document.getElementById('logo-text');
    const logoImg = document.getElementById('logo-img');
    const navTexts = document.querySelectorAll('.nav-text');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const rightSidebar = document.getElementById('right-sidebar');
    const closeRightSidebarBtn = document.getElementById('close-right-sidebar');

    // Check if we're on mobile
    const isMobile = () => window.innerWidth <= 768;

    const toggleSidebar = () => {
        if (isMobile()) {
            // Mobile behavior
            sidebar.classList.toggle('mobile-open');
            mobileOverlay.classList.toggle('active');
        } else {
            // Desktop behavior
            if (sidebar.classList.contains('sidebar-expanded')) {
                sidebar.classList.remove('sidebar-expanded');
                sidebar.classList.add('sidebar-collapsed');
                logoText.style.display = 'none';
                toggleButton.style.display = 'none';
                navTexts.forEach(text => text.style.display = 'none');
            } else {
                sidebar.classList.remove('sidebar-collapsed');
                sidebar.classList.add('sidebar-expanded');
                logoText.style.display = 'block';
                toggleButton.style.display = 'block';
                navTexts.forEach(text => text.style.display = 'block');
            }
        }
    };

    // Mobile menu toggle
    const toggleMobileMenu = () => {
        sidebar.classList.toggle('mobile-open');
        mobileOverlay.classList.toggle('active');
    };

    // Mobile right sidebar toggle
    const toggleMobileRightSidebar = () => {
        rightSidebar.classList.toggle('mobile-open');
        mobileOverlay.classList.toggle('active');
    };

    // Close mobile menus
    const closeMobileMenus = () => {
        sidebar.classList.remove('mobile-open');
        rightSidebar.classList.remove('mobile-open');
        mobileOverlay.classList.remove('active');
    };

    // Event listeners
    if (toggleButton) toggleButton.addEventListener('click', toggleSidebar);
    if (logoImg) logoImg.addEventListener('click', toggleSidebar);
    if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', toggleMobileMenu);
    if (closeRightSidebarBtn) closeRightSidebarBtn.addEventListener('click', closeMobileMenus);
    if (mobileOverlay) mobileOverlay.addEventListener('click', closeMobileMenus);

    // Handle window resize
    window.addEventListener('resize', () => {
        if (!isMobile()) {
            // Reset mobile states when switching to desktop
            sidebar.classList.remove('mobile-open');
            if (rightSidebar) rightSidebar.classList.remove('mobile-open');
            mobileOverlay.classList.remove('active');

            // Show right sidebar on desktop
            if (rightSidebar) {
                rightSidebar.classList.remove('hidden');
                rightSidebar.classList.add('md:block');
            }
            
            // Reset sidebar styles for desktop
            if (!sidebar.classList.contains('sidebar-expanded') && !sidebar.classList.contains('sidebar-collapsed')) {
                sidebar.classList.add('sidebar-expanded');
            }
        } else {
            // Hide right sidebar on mobile by default
            if (rightSidebar) {
                rightSidebar.classList.add('hidden');
                rightSidebar.classList.remove('md:block');
            }
        }
    });

    // Initialize responsive behavior
    window.addEventListener('load', () => {
        if (isMobile()) {
            if (rightSidebar) {
                rightSidebar.classList.add('hidden');
            }
            // Ensure sidebar is properly set up for mobile
            sidebar.classList.remove('mobile-open');
        } else {
            // Ensure sidebar is properly set up for desktop
            if (!sidebar.classList.contains('sidebar-expanded') && !sidebar.classList.contains('sidebar-collapsed')) {
                sidebar.classList.add('sidebar-expanded');
            }
        }
    });
</script>

@stack('scripts')