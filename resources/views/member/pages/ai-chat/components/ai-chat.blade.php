@props([
    'text' => '',
    'time' => '',
])

<div class="flex items-start space-x-2 md:space-x-3">
    <div class="w-6 h-6 md:w-8 md:h-8 rounded-full flex items-center justify-center flex-shrink-0">
        <img src="{{ asset('assets/member-dashboard/images/ai-profile.png') }}" alt="AI" class="w-full h-full object-cover">
    </div>
    <div class="message-bubble">
        <div class="bg-gray-100 rounded-lg p-2 md:p-3">
            <p class="text-xs md:text-sm">{{ $text }}</p>
        </div>
        <div class="flex items-center justify-between mt-1 md:mt-2 text-xs text-gray-500">
            <span>{{ $time }}</span>
            <div class="flex space-x-1 md:space-x-2">
                <button class="cursor-pointer p-1">
                    <img src="{{ asset('assets/member-dashboard/images/copy.png') }}" alt="Copy" class="w-3 h-3 md:w-4 md:h-4">
                </button>
                <button class="cursor-pointer p-1">
                    <img src="{{ asset('assets/member-dashboard/images/like.png') }}" alt="Like" class="w-3 h-3 md:w-4 md:h-4">
                </button>
                <button class="cursor-pointer p-1">
                    <img src="{{ asset('assets/member-dashboard/images/dislike.png') }}" alt="Dislike" class="w-3 h-3 md:w-4 md:h-4">
                </button>
            </div>
        </div>
    </div>
</div>