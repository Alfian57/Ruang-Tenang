<!DOCTYPE html>
<html lang="en">

@include('auth.components.head')

<body class="min-h-screen bg-gray-50 flex">
    <!-- Left Side - Login Form -->
    <div class="flex-1 flex items-center justify-center p-8">
        @yield('content')
    </div>

    <!-- Right Side - Illustration -->
    <div class="flex-1 bg-primary-400 flex flex-col items-center justify-center px-8 overflow-hidden">
        <!-- Background Text -->
        <div class="px-24 text-justify">
            <h2 class="text-white text-center text-[40px] font-medium mb-4">RuangTenang</h2>
            <p class="text-white text-[14px] leading-relaxed">
                Selamatdatang aplikasi platform kesehatan mental terpercaya untuk membantu mengatasi masalah kesehatan
                mental dalam berbagai kondisi. Mulai dari konseling, terapi, hingga pengobatan yang tepat. Platform ini
                hadir untuk memberikan solusi terbaik dalam mengatasi permasalahan mental dan memberikan dukungan dan
                memberikan solusi terbaik untuk kesehatan mental Anda. Dengan fitur-fitur terdepan dan tim ahli yang
                berpengalaman, kami siap membantu Anda mencapai kesehatan mental yang optimal melalui berbagai layanan
                yang tersedia.
            </p>
        </div>

        <div class="w-full flex justify-center">
            <img src="{{ asset('assets/auth/images/auth-img.png') }}" alt="Phone Illustration"
                class="w-2/3 h-auto transform transition-transform hover:scale-105">
        </div>
    </div>

    @include('auth.components.scripts')


</body>

</html>