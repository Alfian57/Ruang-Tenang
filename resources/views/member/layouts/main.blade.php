<!DOCTYPE html>
<html lang="en">

@include('member.components.head')

<body class="bg-gray-50 h-screen overflow-hidden">
    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="mobile-overlay"></div>

    <div class="flex h-full bg-[#EBEBEB]">
        <x-member.left-sidebar />

        <div class="flex-1 flex flex-col min-w-0">
            @include('member.components.page-header')
            @yield('content')
        </div>
    </div>

    @include('member.components.scripts')
</body>

</html>