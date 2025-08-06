@props([
    'id',
    'title',
    'lastMessage' => "Tidak ada pesan sebelumnya",
    'isBookmarked' => false,
    'isFavorited' => false,
    'isDeleted' => false,
])

<div x-data="{ open: false }" class="relative">
    <div class="p-3 bg-gray-50 hover:bg-gray-100 rounded-lg cursor-pointer flex justify-between items-center space-x-3 border border-gray-200">
        @if(!$isDeleted)
            <a href="{{ route('member.ai-chat.show', array_merge(['chatSession' => $id], request()->query())) }}" class="flex-1 min-w-0">
                <div class="font-medium text-gray-800">{{ \Illuminate\Support\Str::limit($title, 25) }}</div>
                <div class="text-xs text-gray-500">
                    {{ \Illuminate\Support\Str::limit($lastMessage, 40) }}
                </div>
            </a>
        @else
            <div class="flex-1 min-w-0 opacity-50 cursor-not-allowed">
                <div class="font-medium text-gray-800">{{ \Illuminate\Support\Str::limit($title, 25) }}</div>
                <div class="text-xs text-gray-500">
                    {{ \Illuminate\Support\Str::limit($lastMessage, 40) }}
                </div>
            </div>
        @endif
        <button @click="open = !open" type="button" class="cursor-pointer">
            <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="Lainnya" class="w-5 h-5">
        </button>
    </div>
    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
        <ul class="py-1">
            <li>
                <a 
                    href="{{ $isBookmarked ? '#' : route('member.ai-chat.bookmark', $id) }}" 
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ $isBookmarked ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}"
                    @if($isBookmarked) aria-disabled="true" tabindex="-1" @endif>
                    Bookmark
                </a>
            </li>
            <li>
                <a 
                    href="{{ $isFavorited ? '#' : route('member.ai-chat.favourite', $id) }}" 
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 {{ $isFavorited ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}"
                    @if($isFavorited) aria-disabled="true" tabindex="-1" @endif>
                    Favourite
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('member.ai-chat.destroy', $id) }}">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 {{ $isDeleted ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}"
                        @if($isDeleted) disabled aria-disabled="true" @endif>
                        Delete
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>