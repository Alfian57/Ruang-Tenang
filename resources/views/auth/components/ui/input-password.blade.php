@props([
    'label' => 'Password',
    'name' => 'password',
    'placeholder' => '••••••••••••',
])

@php
    $uuid = Str::uuid();
@endphp

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleBtn = document.getElementById("togglePassword-{{ $uuid }}");
            const passwordInput = document.getElementById("{{ $uuid }}");

            if (toggleBtn && passwordInput) {
                toggleBtn.addEventListener("click", function () {
                    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                    passwordInput.setAttribute("type", type);
                });
            }
        });
    </script>
@endpush

<div>
    <label for="{{ $uuid }}" class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
    <div class="relative">
        <input type="password" id="{{ $uuid }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
            {{ $attributes->merge([
                'class' => 'w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-colors pr-10 sm:pr-12 text-sm sm:text-base'
            ]) }}
            required>
        @error($name)
            <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
        @enderror
        <button type="button" id="togglePassword-{{ $uuid }}"
            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                </path>
            </svg>
        </button>
    </div>
</div>