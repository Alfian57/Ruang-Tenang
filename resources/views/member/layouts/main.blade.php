<!DOCTYPE html>
<html lang="en">

@include('member.components.head')

<body class="bg-gray-50 h-screen overflow-hidden">
    <div class="flex h-full">
        @include('member.components.left-sidebar')

        <div class="flex-1 flex flex-col">
            @yield('content')
        </div>
    </div>

    @include('member.components.scripts')
</body>

</html>