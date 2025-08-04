@props([
    'text' => '',
    'time' => '',
])

<div class="flex items-start space-x-3">
    <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0">
        <img src="{{ asset('assets/member-dashboard/images/ai-profile.png') }}" alt="AI">
    </div>
    <div class="message-bubble">
        <div class="bg-gray-100 rounded-lg p-3">
            <p>{{ $text }}</p>
        </div>
        <div class="flex items-center justify-between mt-2 text-xs text-gray-500">
                <span>{{ $time }}</span>
                <div class="flex space-x-2">
                    <button class="cursor-pointer">
                        <img src="{{ asset('assets/member-dashboard/images/copy.png') }}" alt="Copy" class="w-4 h-4">
                    </button>
                    <button class="cursor-pointer">
                        <img src="{{ asset('assets/member-dashboard/images/like.png') }}" alt="Like" class="w-4 h-4">
                    </button>
                    <button class="cursor-pointer">
                        <img src="{{ asset('assets/member-dashboard/images/dislike.png') }}" alt="Dislike" class="w-4 h-4">
                    </button>
                </div>
            </div>
    </div>
</div>