<!DOCTYPE html>
<html lang="en">

@include('member.components.head')

<body class="bg-gray-50 h-screen overflow-hidden">
    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="mobile-overlay"></div>
    
    <div class="flex h-full">
        @include('member.components.left-sidebar')

        <div class="flex-1 flex flex-col min-w-0">
            @yield('content')
        </div>
    </div>

    @include('member.components.scripts')
</body>

</html>