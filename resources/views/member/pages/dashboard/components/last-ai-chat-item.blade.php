@props([
    'id' => null,
    'title' => '',
    'subtitle' => '',
])

@push('scripts')
    <script src="{{ asset('assets/member-dashboard/js/dashboard-ai-chat.js') }}"></script>
@endpush

<div class="w-full flex items-center justify-between border border-gray-300 p-2 rounded-xl">
    <a href="{{ route('member.ai-chat.show', $id) }}" class="flex-1">
        <p class="text-sm font-medium hover:text-primary-400">{{ $title }}</p>
        <p class="text-sm text-gray-600">{{ $subtitle }}</p>
    </a>
    
    <!-- Dropdown Menu -->
    <div class="relative">
        <img 
            src="{{ asset('assets/member-dashboard/images/more.png') }}" 
            alt="more" 
            class="w-6 h-6 cursor-pointer hover:opacity-70 transition-opacity"
            onclick="toggleDropdown('dropdown-{{ $id }}')">
        
        <div 
            id="dropdown-{{ $id }}"
            class="absolute right-0 top-8 w-32 bg-white border border-gray-200 rounded-lg shadow-lg z-10 hidden">
            <div class="py-1">
                <form action="{{ route('member.ai-chat.destroy', $id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-150">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

