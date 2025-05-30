<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MemAdmin</title>

    {{-- Font Awesome (correct & compleet) --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    {{-- Vite assets --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @endif

    {{-- Theme color for mobile address bar --}}
    <meta name="theme-color" content="#0d6efd">
</head>

<body class="h-100 d-flex flex-column bg-light text-dark">
    {{-- Layout wrapper --}}
    <main class="flex-grow-1 d-flex">
        @yield('layout')
    </main>
</body>

</html>
