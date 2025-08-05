@props([
    'title' => '',
    'subtitle' => '',
])

<div class="w-full flex items-center justify-between border border-gray-300 p-2 rounded-xl">
    <div>
        <p class="text-sm font-medium">{{ $title }}</p>
        <p class="text-sm text-gray-600">{{ $subtitle }}</p>
    </div>
    <img src="{{ asset('assets/member-dashboard/images/more.png') }}" alt="more" class="w-6 h-6 cursor-pointer">
</div>