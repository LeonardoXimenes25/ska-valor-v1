<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Baranda') | SKA VALOR</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="icon" type="image/png" href="{{ asset('assets/img/ska-valor.png') }}">

    <link rel="preload" as="image" href="URL_HERO_IMAGE">
    @livewireStyles
    @stack('styles')
</head>
<body>
    <!-- Navigation start -->
    {{-- @include('partials.navbar') --}}
    <livewire:components.navbar/>
    {{-- navigation end --}}

    <!-- Hero Section -->
    {{ $slot }}

    <!-- Footer start -->
    <livewire:components.footer/>
    {{-- footer end --}}
    
    {{-- livewire js --}}
    @livewireScripts

    <!-- Bootstrap JS Bundle -->
    <script src="{{ asset('assets/js/script.js') }}" defer></script>

    {{-- sweetalert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
</body>
</html>