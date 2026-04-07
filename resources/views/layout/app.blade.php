<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Learning Center - Gratis & Inklusif</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

      @livewireStyles
</head>
<body>

    <!-- Navigation start -->
    @include('partials.navbar')
    {{-- navigation end --}}
   

    <!-- Hero Section -->
    <section class="hero-section" id="home">
       <main>
            @yield('content')
       </main>
    </section>

    <!-- Goals Section -->


    <!-- Program Section -->
   
    <!-- Call to Action -->
   

    <!-- Footer start -->
    @include('partials.footer')
    {{-- footer end --}}
    

    {{-- livewire js --}}
     @livewireScripts

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>