<nav class="navbar navbar-expand-lg fixed-top py-4">
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
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#goals">Objetivu</a></li>
                <li class="nav-item"><a class="nav-link" href="#program">Programa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('article')}}">Portal Informasaun</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('module') }}">Materia</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('list-student') }}">Lista Estudante</a></li>
                        <li><a class="dropdown-item" href="{{ route('list-teacher') }}">Lista Formador</a></li>
                    </ul>
                </li>
            </ul>

            <!-- RIGHT: AUTH -->
            <div class="d-flex gap-2 ms-lg-auto justify-content-center justify-content-lg-end mt-3 mt-lg-0">
                <a class="btn px-4" href="{{ route('login') }}">Login</a>
                <a class="btn btn-primary px-4" href="{{ route('auth.register') }}">Sign Up</a>
            </div>

        </div>
    </div>
</nav>