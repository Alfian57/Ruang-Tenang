@props([
    'icon',
    'label',
    'count' => null,
    'isActive' => false,
    'href' => '#',
])

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