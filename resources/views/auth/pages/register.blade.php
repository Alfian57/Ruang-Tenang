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
            <p class="text-gray-600 text-xs sm:text-sm">Masukan detail Anda untuk registrasi</p>
        </div>

        <form method="POST" action="{{ route('register.create') }}" class="space-y-4 sm:space-y-6">
            @csrf

            <x-auth::ui.input-text label="Nama" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required />
            <x-auth::ui.input-text label="Email" name="email" placeholder="user@user.com" value="{{ old('email') }}"
                type="email" required />
            <x-auth::ui.input-password label="Password" name="password" placeholder="••••••••••••" required />
            <x-auth::ui.input-password label="Konfirmasi Password" name="password_confirmation" placeholder="••••••••••••"
                required />

            <x-auth::ui.button type="submit">
                Registrasi
            </x-auth::ui.button>

            <div class="text-center">
                <p class="text-xs sm:text-sm text-gray-600">
                    Sudah punya Akun?
                    <a href="{{ route('login') }}" class="text-red-600 hover:text-red-700 font-medium">
                        Masuk disini
                    </a>
                </p>
            </div>
        </form>
    </div>
@endsection