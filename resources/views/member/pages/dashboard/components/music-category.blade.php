<div class="px-4 space-y-2">
    {{-- Category Header --}}
    <div class="flex items-center bg-gray-200 bg-opacity-10 p-2 md:p-3 cursor-pointer hover:bg-opacity-20 rounded-lg transition-all duration-200"
        data-category-id="{{ $category->id }}">
        <img src="{{ asset('storage/' . $category->thumbnail) }}" alt="{{ $category->name }}"
            class="w-14 h-14 md:w-16 md:h-16 rounded mr-2 md:mr-3">
        <div class="flex-1 min-w-0">
            <p class="font-medium text-base md:text-lg truncate">{{ $category->name }}</p>
            <p class="text-base opacity-75">{{ $category->songs_count }} Lagu</p>
        </div>
        <svg id="icon-{{ $category->id }}" class="w-5 h-5 transition-transform duration-200" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>

    {{-- Dropdown Content --}}
    <div id="dropdown-{{ $category->id }}" class="hidden bg-gray-200 bg-opacity-95 rounded-lg mb-2">
        @foreach ($category->songs as $song)
            @include('member.pages.dashboard.components.music-item', [
                'song' => $song,
                'category' => $category
            ])
        @endforeach
    </div>
</div>
