<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "" }} - {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/auth/css/login.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>