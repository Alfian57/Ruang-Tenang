@props([
    'variant' => 'primary',
    'href' => null,
    'type' => 'submit',
])
@php
    $baseClasses = 'w-full py-2 sm:py-3 px-4 rounded-lg font-medium transition-colors text-sm sm:text-base';
    $variants = [
        'primary' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-4 focus:ring-red-200',
        // other variants can be added here
    ];
    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif