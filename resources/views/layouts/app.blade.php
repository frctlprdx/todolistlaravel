<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Pastikan Tailwind terhubung -->
</head>
<body class="bg-gray-100">
    @include('partials.navbar') <!-- Navbar -->

    @yield('hero')

    @yield('carousel') <!-- Tempat untuk carousel -->

    @yield('showcase')

    @yield('footer')

</body>
</html>
