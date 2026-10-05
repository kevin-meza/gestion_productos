<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('imagenes/logo/km_logo.png') }}"
                alt="Logo"
                width="80"
                height="30">
        </a>
        <a class="navbar-brand" href="{{ url('/') }}">
            Mi Proyecto
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav ms-auto">
                @if(!Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Ingresar</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>
                @if(Auth::user())
                    @if(Auth::user()->tipo_user == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/personas') }}">Personas</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/productos') }}">Productos</a>
                    </li>

                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
                </li>
                @if(Auth::user())
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                        {{-- opciones perfil --}}
                        <div class="container-fluid">


                            <div class="ms-auto">
                                <div class="dropdown">
                                    <button
                                    class="btn btn-secondary dropdown-toggle d-flex align-items-center gap-2"
                                    type="button"
                                    id="userDropdown"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <!-- Icono-->
                                    <i class="bi bi-person-circle"></i>
                                    <span>Mi Perfil</span>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    {{-- <li><a class="dropdown-item" href="#perfil">Ver Perfil</a></li> --}}
                                    {{-- <li><a class="dropdown-item" href="#configuracion">Configuración</a></li> --}}
                                    {{-- <li><hr class="dropdown-divider"></li> --}}
                                    <li>
                                    <button class="dropdown-item text-danger fw-bold" id="logoutBtn" type="button" onclick="window.location.href='/logout'">
                                            Cerrar sesión
                                        </button>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                @endif
            </ul>
        </div>
    </div>
</nav>
