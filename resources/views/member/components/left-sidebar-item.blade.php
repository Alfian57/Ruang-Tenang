@props([
    'href' => '#',
    'icon' => '',
    'activeIcon' => '',
    'label' => '',
    'count' => null,
])

@php
    use Illuminate\Support\Str;
    $isActive = Str::startsWith(request()->url(), $href);

    $baseClasses = 'flex items-center space-x-3 p-2 rounded-lg';
    $activeClasses = $isActive
        ? 'bg-primary-100 text-primary-400'
        : 'hover:bg-gray-100 text-gray-700';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => "$baseClasses $activeClasses"]) }}>
    @if ($isActive && $activeIcon)
        <img src="{{ asset($activeIcon) }}" alt="{{ $label }} active icon" class="w-5 h-5" />
    @elseif ($icon)
        <img src="{{ asset($icon) }}" alt="{{ $label }} icon" class="w-5 h-5" />
    @endif
    <span class="nav-text">{{ $label }}</span>
    @if (!is_null($count))
        <span class="nav-text ml-auto text-sm {{ $isActive ? 'border-r-3 border-primary-400 bg-opacity-20 px-2 py-1' : 'text-gray-500' }}">
            {{ $count }}
        </span>
    @endif
</a>