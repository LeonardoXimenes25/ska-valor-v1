<nav class="navbar navbar-expand-lg fixed-top py-3">
    <div class="container d-flex align-items-center">

        <!-- LEFT: LOGO -->
        <a class="navbar-brand fw-bold text-primary" href="{{route('home')}}">
            <img src="{{asset('assets/img/ska-valor.png')}}" alt="logo ska valor lautem" width="30" height="30">SKA VALOR
        </a>

        <!-- TOGGLER (mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- CENTER + RIGHT WRAPPER -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <!-- CENTER MENU -->
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}" wire:navigate.hover>Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#goals">Objetivu</a></li>
                <li class="nav-item"><a class="nav-link" href="#program">Programa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('article')}}" wire:navigate.hover>Portal Informasaun</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('list-lesson')}}" wire:navigate.hover>Materia</a></li>

                <li class="nav-item dropdown" x-data="{ open: false }">
                    <a class="nav-link dropdown-toggle" 
                    href="#" 
                    @click.prevent="open = !open" 
                    @click.outside="open = false">
                        Profile
                    </a>
                    <ul class="dropdown-menu" :class="{ 'show': open }">
                        <li><a class="dropdown-item" href="{{route('list-student')}}" wire:navigate.hover>Lista Estudante</a></li>
                        <li><a class="dropdown-item" href="{{route('list-teacher')}}" wire:navigate.hover>Lista Formador</a></li>
                    </ul>
                </li>
            </ul>

            <!-- RIGHT: AUTH -->
            <div class="d-flex gap-2 ms-lg-auto justify-content-center justify-content-lg-end mt-3 mt-lg-0">
                <a class="btn px-4" href="{{route('login')}}" wire:navigate.hover>Sign in</a>
                <a class="btn btn-primary px-4" href="{{route('register')}}" wire:navigate.hover>Sign up</a>
            </div>

        </div>
    </div>
</nav>