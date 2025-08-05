@extends('auth.layouts.main')

@section('content')
    <div class="bg-white rounded-2xl shadow-custom p-4 sm:p-6 lg:p-8 w-full max-w-sm sm:max-w-md mx-4">
        <div class="text-center mb-6 lg:mb-8">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="w-12 h-12 sm:w-16 sm:h-16 mb-4">
                <div class="flex flex-col leading-none">
                    <span class="text-xl sm:text-2xl leading-none font-bold text-primary-400">Ruang</span>
                    <span class="text-xl sm:text-2xl leading-none font-bold text-primary-400 ml-2 sm:ml-4">Tenang</span>
                </div>
            </div>
            <p class="text-gray-600 text-xs sm:text-sm">Masukan detail Anda untuk masuk</p>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login.authenticate') }}" class="space-y-4 sm:space-y-6">
            @csrf

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="user@user.com" value="{{ old('email') }}"
                    class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-colors text-sm sm:text-base"
                    required>
                @error('email')
                    <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="••••••••••••"
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition-colors pr-10 sm:pr-12 text-sm sm:text-base"
                        required>
                    @error('password')
                        <span class="text-red-500 text-xs sm:text-sm">{{ $message }}</span>
                    @enderror
                    <button type="button" id="togglePassword"
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

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between flex-wrap gap-2">
                <label class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                    <span class="ml-2 text-xs sm:text-sm text-gray-700">Ingat Aku</span>
                </label>
                <a href="#" class="text-xs sm:text-sm text-red-600 hover:text-red-700">Lupa Password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit"
                class="w-full bg-red-600 text-white py-2 sm:py-3 px-4 rounded-lg font-medium hover:bg-red-700 focus:ring-4 focus:ring-red-200 transition-colors text-sm sm:text-base">
                Masuk
            </button>

            <!-- Register Link -->
            <div class="text-center">
                <p class="text-xs sm:text-sm text-gray-600">
                    Tidak punya Akun?
                    <a href="{{ route('register') }}" class="text-red-600 hover:text-red-700 font-medium">
                        Registrasi disini
                    </a>
                </p>
            </div>
        </form>
    </div>
@endsection