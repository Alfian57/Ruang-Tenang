<!DOCTYPE html>
<html lang="en">

@include('member.components.head')

<body class="bg-gray-50 h-screen overflow-hidden">
    @include('sweetalert::alert')
    @include('member.components.logout-modal')

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="mobile-overlay"></div>

    <div class="flex h-full bg-[#EBEBEB] relative">
        <x-member.left-sidebar />

        <div class="flex-1 flex flex-col min-w-0 w-full md:w-auto">
            <div class="px-4 pt-4">
                @include('member.components.page-header')
            </div>
            @yield('content')
        </div>
    </div>

    @include('member.components.scripts')
</body>

</html>