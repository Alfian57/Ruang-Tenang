@props([
    'text' => '',
    'time' => '',
    'avatar' => 'assets/member-dashboard/images/dummy-profile.png',
])
                
<div class="flex justify-end space-x-3">
    <div class="message-bubble">
        <div class=" bg-primary-400 text-white rounded-lg p-3">
            <p class="text-sm">{{ $text }}</p>
        </div>
        <div class="text-xs opacity-75 mt-2 text-right">{{ $time }}</div>
    </div>
    <div class="w-8 h-8 rounded-full flex items-center overflow-hidden justify-center flex-shrink-0">
        <img src="{{ asset($avatar) }}" alt="User">
    </div>
</div>