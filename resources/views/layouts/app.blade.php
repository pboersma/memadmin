<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MemAdmin</title>

    <script src="
    https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/js/all.min.js
    "></script>
    <link href="
        https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.7.2/css/fontawesome.min.css
        " rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @endif
</head>

<body class="h-100 d-flex">
    @include('partials.menu')

    <div class="container p-5">
        @yield('content')
    </div>
</body>

</html>
