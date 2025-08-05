<!DOCTYPE html>
<html lang="en">

@include('auth.components.shared.head')


<body class="min-h-screen bg-gray-50 flex flex-col lg:flex-row">
    @include('sweetalert::alert')

    <!-- Left Side - Login Form -->
    <div class="flex-1 flex items-center justify-center p-4 sm:p-6 lg:p-8 order-2 lg:order-1">
        @yield('content')
    </div>

    <!-- Right Side - Illustration -->
    <div
        class="flex-1 bg-primary-400 flex flex-col items-center justify-center px-4 sm:px-6 lg:px-8 overflow-hidden relative order-1 lg:order-2 min-h-[300px] lg:min-h-screen">
        <!-- Background Text -->
        <div class="px-4 sm:px-8 md:px-16 lg:px-24 text-justify hidden md:block">
            <h2 class="text-white text-center text-2xl sm:text-3xl lg:text-[40px] font-medium mb-2 lg:mb-4">RuangTenang
            </h2>
            <p class="text-white text-xs sm:text-sm lg:text-[14px] leading-relaxed">
                Selamat datang aplikasi platform kesehatan mental terpercaya untuk membantu mengatasi masalah kesehatan
                mental dalam berbagai kondisi. Mulai dari konseling, terapi, hingga pengobatan yang tepat. Platform ini
                hadir untuk memberikan solusi terbaik dalam mengatasi permasalahan mental dan memberikan dukungan dan
                memberikan solusi terbaik untuk kesehatan mental Anda. Dengan fitur-fitur terdepan dan tim ahli yang
                berpengalaman, kami siap membantu Anda mencapai kesehatan mental yang optimal melalui berbagai layanan
                yang tersedia.
            </p>
        </div>

        <!-- Mobile/Tablet Title -->
        <div class="block md:hidden text-center py-4">
            <h2 class="text-white text-2xl font-medium">RuangTenang</h2>
            <p class="text-white text-sm mt-2 px-4">Platform kesehatan mental terpercaya</p>
        </div>

        <div class="w-full flex justify-center">
            <img src="{{ asset('assets/auth/images/auth-img.png') }}" alt="Phone Illustration"
                class="w-1/2 sm:w-1/3 lg:w-2/3 h-auto transform transition-transform hover:scale-105 z-20">
        </div>

        <img src="{{ asset('assets/auth/images/auth-vector.png') }}" alt="Layer"
            class="-bottom-2/7 left-0 right-0 w-full absolute z-10 hidden lg:block">

        <img src="{{ asset('assets/auth/images/auth-background.png') }}" alt="Layer"
            class="bottom-0 left-0 right-0 w-full absolute z-30 hidden lg:block">
    </div>

    @include('auth.components.shared.scripts')


</body>

</html>