@props([
    'label',
    'name',
    'placeholder' => '',
    'value' => '',
    'type' => 'text',
    'required' => false,
])

@php
    $uuid = Str::uuid();
@endphp

<div>
    <label for="{{ $uuid }}" class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
    <input
        type="{{ $type }}"
        id="{{ $uuid }}"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => "w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-colors text-sm sm:text-base"]) }}
    >
    @error($name)
        <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
    @enderror
</div>