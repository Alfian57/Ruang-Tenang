@extends('auth.layouts.main')

@section('content')
    <div class="bg-white rounded-2xl shadow-custom p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-primary-400 mb-2">{{ config("app.name") }}</h1>
            <p class="text-gray-600 text-sm">Masukan detail Anda untuk masuk</p>
        </div>

        <!-- Login Form -->
        <form id="loginForm" method="POST" action="{{ route('login.authenticate') }}" class="space-y-6">
            @csrf

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="user@user.com" value="{{ old('email') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-colors"
                    required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="••••••••••••"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-colors pr-12"
                        required>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                    <span class="ml-2 text-sm text-gray-700">Ingat Aku</span>
                </label>
                <a href="#" class="text-sm text-red-600 hover:text-red-700">Lupa Password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-red-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-red-700 focus:ring-4 focus:ring-red-200 transition-colors">
                Masuk
            </button>

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Tidak punya Akun?
                    <a href="{{ route('register') }}" class="text-red-600 hover:text-red-700 font-medium">
                        Registrasi disini
                    </a>
                </p>
            </div>
        </form>
    </div>
@endsection