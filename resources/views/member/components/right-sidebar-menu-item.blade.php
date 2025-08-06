@props([
    'icon',
    'label',
    'count' => null,
    'filter' => '#',
])

@php
    $href = url()->current() . '?filter=' . urlencode($filter);

    $isActive = false;
    if (
        (
            request()->routeIs('member.ai-chat') ||
            request()->routeIs('member.ai-chat.show')
        )
        && request()->get('filter') === $filter
    ) {
        $isActive = true;
    }
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge([
    'class' => 'flex items-center space-x-3 p-2 hover:bg-gray-100 rounded' . ($isActive ? ' bg-gray-200' : '')
]) }}>
    <img src="{{ asset($icon) }}" alt="{{ $label }}" class="w-6 h-6">
    <span class="text-sm text-gray-700">{{ $label }}</span>
    @if($count !== null)
        <span class="ml-auto text-xs text-gray-500">{{ $count }}</span>
    @endif
</a>