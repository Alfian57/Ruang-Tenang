<div class="relative" id="globalSearch">
    <!-- Desktop Search -->
    <div class="desktop-search flex items-center bg-primary-700 bg-opacity-20 rounded-full px-2"
        style="min-width: 400px;">
        <input type="text" id="searchInput" placeholder="Cari artikel atau lagu..."
            class="flex-1 text-sm text-white placeholder-white focus:outline-none px-2 py-1 bg-transparent" />
        <button id="searchButton" class="p-2 hover:bg-primary-dark rounded">
            <img src="{{ asset('assets/member-dashboard/images/search.png') }}" alt="Cari" class="w-6 h-6">
        </button>

        <!-- Search Dropdown -->
        <div id="searchDropdown"
            class="absolute top-full left-0 right-0 mt-2 bg-white rounded-lg shadow-xl border z-50 max-h-96 overflow-y-auto hidden">

            <!-- Search Categories -->
            <div id="searchCategories" class="p-4">
                <h3 class="text-sm font-medium text-gray-600 mb-3">Kategori Pencarian</h3>
                <div class="space-y-2">
                    <button data-type="artikel"
                        class="category-btn w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded flex items-center">
                        <svg class="w-4 h-4 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <span>Artikel</span>
                    </button>
                    <button data-type="lagu"
                        class="category-btn w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded flex items-center">
                        <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3">
                            </path>
                        </svg>
                        <span>Lagu & Musik</span>
                    </button>
                </div>
            </div>

            <!-- Search Results -->
            <div id="searchResults" class="hidden">
                <div id="noResults" class="p-4 text-center text-gray-500 hidden">
                    <svg class="w-8 h-8 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <p class="text-sm">Tidak ada hasil ditemukan</p>
                </div>
                <div id="resultsList"></div>
            </div>
        </div>
    </div>

    <!-- Mobile Search Button -->
    <button id="mobileSearchBtn" class="mobile-search p-2 hover:bg-primary-dark rounded md:hidden">
        <img src="{{ asset('assets/member-dashboard/images/search.png') }}" alt="Cari" class="w-6 h-6">
    </button>

    <!-- Mobile Search Modal -->
    <div id="mobileSearchModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 md:hidden hidden">
        <div class="bg-white h-full">
            <div class="p-4 border-b">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Pencarian</h3>
                    <button id="closeMobileSearch" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <input type="text" id="mobileSearchInput" placeholder="Cari artikel atau lagu..."
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" />
            </div>
            <div class="p-4 overflow-y-auto" style="height: calc(100% - 120px);">
                <!-- Mobile Categories -->
                <div id="mobileCategoriesContent">
                    <h4 class="text-sm font-medium text-gray-600 mb-3">Kategori Pencarian</h4>
                    <div class="space-y-2">
                        <button data-type="artikel"
                            class="mobile-category-btn w-full text-left px-3 py-3 text-gray-700 hover:bg-gray-100 rounded flex items-center">
                            <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span>Artikel</span>
                        </button>
                        <button data-type="lagu"
                            class="mobile-category-btn w-full text-left px-3 py-3 text-gray-700 hover:bg-gray-100 rounded flex items-center">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3">
                                </path>
                            </svg>
                            <span>Lagu & Musik</span>
                        </button>
                    </div>
                </div>

                <!-- Mobile Search Results -->
                <div id="mobileSearchResults" class="hidden">
                    <div id="mobileNoResults" class="text-center text-gray-500 py-8 hidden">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <p>Tidak ada hasil ditemukan</p>
                    </div>
                    <div id="mobileResultsList"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data from Laravel component
        const articles = @json($articles);
        const songs = @json($songs);

        // Combine articles and songs into searchData
        const searchData = [
            ...articles.map(article => ({
                id: article.id,
                title: article.title,
                type: 'artikel',
                url: `/member/articles/${article.id}`
            })),
            ...songs.map(song => ({
                id: song.id,
                title: song.title,
                type: 'lagu',
                url: `#`
            }))
        ];

        // State variables
        let searchQuery = '';
        let filteredResults = [];
        let selectedIndex = -1;
        let showDropdown = false;
        let showMobileSearch = false;

        // DOM Elements
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const searchDropdown = document.getElementById('searchDropdown');
        const searchCategories = document.getElementById('searchCategories');
        const searchResults = document.getElementById('searchResults');
        const noResults = document.getElementById('noResults');
        const resultsList = document.getElementById('resultsList');

        // Mobile elements
        const mobileSearchBtn = document.getElementById('mobileSearchBtn');
        const mobileSearchModal = document.getElementById('mobileSearchModal');
        const closeMobileSearch = document.getElementById('closeMobileSearch');
        const mobileSearchInput = document.getElementById('mobileSearchInput');
        const mobileCategoriesContent = document.getElementById('mobileCategoriesContent');
        const mobileSearchResults = document.getElementById('mobileSearchResults');
        const mobileNoResults = document.getElementById('mobileNoResults');
        const mobileResultsList = document.getElementById('mobileResultsList');

        // Helper functions
        function hideDropdown() {
            showDropdown = false;
            searchDropdown.classList.add('hidden');
        }

        function showDropdownElement() {
            showDropdown = true;
            searchDropdown.classList.remove('hidden');
        }

        function updateDropdownContent() {
            if (searchQuery.length === 0) {
                searchCategories.classList.remove('hidden');
                searchResults.classList.add('hidden');
            } else {
                searchCategories.classList.add('hidden');
                searchResults.classList.remove('hidden');

                if (filteredResults.length === 0) {
                    noResults.classList.remove('hidden');
                    resultsList.innerHTML = '';
                } else {
                    noResults.classList.add('hidden');
                    renderResults();
                }
            }
        }

        function renderResults() {
            resultsList.innerHTML = '';

            filteredResults.forEach((result, index) => {
                const div = document.createElement('div');
                div.className = `px-4 py-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 ${index === selectedIndex ? 'bg-gray-50' : ''}`;
                div.onclick = () => selectResult(result);

                const iconColor = result.type === 'artikel' ? 'blue' : result.type === 'lagu' ? 'green' : 'purple';
                const iconSvg = getIconSvg(result.type);

                div.innerHTML = `
                <div class="flex items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 bg-${iconColor}-100 text-${iconColor}-600">
                        ${iconSvg}
                    </div>
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900">${result.title}</h4>
                        <p class="text-xs text-gray-500 capitalize">${result.type}</p>
                    </div>
                </div>
            `;

                resultsList.appendChild(div);
            });
        }

        function renderMobileResults() {
            mobileResultsList.innerHTML = '';

            filteredResults.forEach((result) => {
                const div = document.createElement('div');
                div.className = 'px-3 py-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100';
                div.onclick = () => selectResult(result);

                const iconColor = result.type === 'artikel' ? 'blue' : result.type === 'lagu' ? 'green' : 'purple';
                const iconSvg = getMobileIconSvg(result.type);

                div.innerHTML = `
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center mr-3 bg-${iconColor}-100 text-${iconColor}-600">
                        ${iconSvg}
                    </div>
                    <div class="flex-1">
                        <h4 class="font-medium text-gray-900">${result.title}</h4>
                        <p class="text-sm text-gray-500 capitalize">${result.type}</p>
                    </div>
                </div>
            `;

                mobileResultsList.appendChild(div);
            });
        }

        function getIconSvg(type) {
            const icons = {
                'artikel': `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>`,
                'lagu': `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
            </svg>`
            };
            return icons[type] || icons['artikel'];
        }

        function getMobileIconSvg(type) {
            const icons = {
                'artikel': `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 712-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>`,
                'lagu': `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
            </svg>`
            };
            return icons[type] || icons['artikel'];
        }

        function handleSearch() {
            if (searchQuery.length === 0) {
                filteredResults = [];
                selectedIndex = -1;
                updateDropdownContent();
                updateMobileContent();
                return;
            }

            filteredResults = searchData.filter(item =>
                item.title.toLowerCase().includes(searchQuery.toLowerCase())
            ).slice(0, 8);

            selectedIndex = -1;
            updateDropdownContent();
            updateMobileContent();
        }

        function updateMobileContent() {
            if (searchQuery.length === 0) {
                mobileCategoriesContent.classList.remove('hidden');
                mobileSearchResults.classList.add('hidden');
            } else {
                mobileCategoriesContent.classList.add('hidden');
                mobileSearchResults.classList.remove('hidden');

                if (filteredResults.length === 0) {
                    mobileNoResults.classList.remove('hidden');
                    mobileResultsList.innerHTML = '';
                } else {
                    mobileNoResults.classList.add('hidden');
                    renderMobileResults();
                }
            }
        }

        function quickSearch(type) {
            searchQuery = '';
            searchInput.value = '';
            if (mobileSearchInput) mobileSearchInput.value = '';

            filteredResults = searchData.filter(item => item.type === type).slice(0, 8);
            showDropdownElement();
            updateDropdownContent();
            updateMobileContent();
        }

        function selectResult(result) {
            console.log('Selected:', result);

            // Handle redirect based on result type
            if (result.url && result.url !== '#') {
                window.location.href = result.url;
            } else {
                // Fallback for items without valid URL
                console.log('No valid URL for this item:', result);
                if (result.type === 'lagu') {
                    alert('Fitur halaman detail lagu akan segera hadir!');
                }
            }

            resetSearchState();
        }

        function resetSearchState() {
            hideDropdown();
            showMobileSearch = false;
            if (mobileSearchModal) mobileSearchModal.classList.add('hidden');
            searchQuery = '';
            searchInput.value = '';
            if (mobileSearchInput) mobileSearchInput.value = '';
            filteredResults = [];
            selectedIndex = -1;
        }

        function performSearch() {
            if (searchQuery.trim() === '') return;

            console.log('Performing search for:', searchQuery);
            // Di sini Anda bisa menambahkan logika pencarian global
            // window.location.href = '/search?q=' + encodeURIComponent(searchQuery);

            hideDropdown();
        }

        // Event Listeners
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                searchQuery = this.value;
                handleSearch();
            });

            searchInput.addEventListener('focus', function () {
                showDropdownElement();
                updateDropdownContent();
            });

            searchInput.addEventListener('blur', function () {
                setTimeout(() => {
                    if (!searchDropdown.matches(':hover')) {
                        hideDropdown();
                    }
                }, 150);
            });

            searchInput.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    hideDropdown();
                } else if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    if (selectedIndex < filteredResults.length - 1) {
                        selectedIndex++;
                        renderResults();
                    }
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    if (selectedIndex > 0) {
                        selectedIndex--;
                        renderResults();
                    }
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    if (selectedIndex >= 0 && filteredResults[selectedIndex]) {
                        selectResult(filteredResults[selectedIndex]);
                    }
                }
            });
        }

        if (searchButton) {
            searchButton.addEventListener('click', performSearch);
        }

        // Category button event listeners
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                quickSearch(this.dataset.type);
            });
        });

        // Mobile category button event listeners
        document.querySelectorAll('.mobile-category-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                quickSearch(this.dataset.type);
            });
        });

        // Mobile search event listeners
        if (mobileSearchBtn) {
            mobileSearchBtn.addEventListener('click', function () {
                showMobileSearch = true;
                if (mobileSearchModal) {
                    mobileSearchModal.classList.remove('hidden');
                    setTimeout(() => {
                        if (mobileSearchInput) mobileSearchInput.focus();
                    }, 100);
                }
            });
        }

        if (closeMobileSearch) {
            closeMobileSearch.addEventListener('click', function () {
                showMobileSearch = false;
                if (mobileSearchModal) mobileSearchModal.classList.add('hidden');
            });
        }

        if (mobileSearchInput) {
            mobileSearchInput.addEventListener('input', function () {
                searchQuery = this.value;
                searchInput.value = this.value; // Sync with desktop
                handleSearch();
            });
        }

        // Click outside to close dropdown
        document.addEventListener('click', function (e) {
            if (!document.getElementById('globalSearch').contains(e.target)) {
                hideDropdown();
            }
        });

        // Close mobile modal when clicking outside
        if (mobileSearchModal) {
            mobileSearchModal.addEventListener('click', function (e) {
                if (e.target === this) {
                    showMobileSearch = false;
                    this.classList.add('hidden');
                }
            });
        }
    });
</script>