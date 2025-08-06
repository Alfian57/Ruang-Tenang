@props([
    'id' => null,
    'title' => '',
    'subtitle' => '',
])

<div class="w-full flex items-center justify-between border border-gray-300 p-2 rounded-xl">
    <a href="{{ route('member.ai-chat.show', $id) }}">
        <p class="text-sm font-medium hover:text-primary-400">{{ $title }}</p>
        <p class="text-sm text-gray-600">{{ $subtitle }}</p>
    </a>
    <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="more" class="w-6 h-6 cursor-pointer">
</div>