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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/personas') }}">Personas</a>
                </li>
                   <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contacto') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/personas/create') }}">Registrar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
