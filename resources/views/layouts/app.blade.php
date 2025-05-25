<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- <video autoplay muted loop id="background-video">
        <source src="/storage/perfiles/videoplayback.mp4" type="video/mp4">
        Tu navegador no soporta videos HTML5.
    </video> -->

    <header class="p-3 bg-black">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none me-3">
                    <img src="{{ asset('storage/perfiles/logo.png') }}" alt="Logo" width="60" height="60">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('Inicio') }}" class="nav-link px-2 no-boot {{ request()->routeIs('Inicio') ? 'active-link' : 'inactive-link' }}">Inicio</a></li>
                    <li><a href="{{ route('Ver') }}" class="nav-link px-2 no-boot {{ request()->routeIs('Ver') ? 'active-link' : 'inactive-link' }}">Ver</a></li>
                    <li><a href="{{ route('Elegir') }}" class="nav-link px-2 no-boot {{ request()->routeIs('Elegir') ? 'active-link' : 'inactive-link' }}">Añadir</a></li>
                    <li><a href="{{ route('Editar') }}" class="nav-link px-2 no-boot {{ request()->routeIs('Editar') ? 'active-link' : 'inactive-link' }}">Editar</a></li>
                    <li><a href="{{ route('Eliminar') }}" class="nav-link px-2 no-boot {{ request()->routeIs('Eliminar') ? 'active-link' : 'inactive-link' }}">Borrar</a></li>
                    <li><a href="{{ route('Generos') }}" class="nav-link px-2 no-boot {{ request()->routeIs('Generos') ? 'active-link' : 'inactive-link' }}">Géneros</a></li>
                    <li><a href="{{ route('About Us') }}" class="nav-link px-2 no-boot {{ request()->routeIs('About Us') ? 'active-link' : 'inactive-link' }}">Sobre Nosotros</a></li>
                </ul>

                <div class="dropdown text-end">
                    @if (Auth::check())
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('storage/' . (Auth::user()->imagen ?? 'perfiles/icono-usuario.png')) }}" alt="Foto de perfil" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="{{ route('Perfil') }}">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('Log-out') }}">Cerrar Sesión</a></li>
                        </ul>
                    @else
                    <button type="button" class="btn-outline-morado me-2">
                        <a href="{{ route('Iniciar Sesion') }}" class="btn-link">Iniciar Sesión</a>
                    </button>
                    <button type="button" class="btn-morado">
                        <a href="{{ route('Registro') }}" class="btn-link">Registrarse</a>
                    </button>
                    @endif
                </div>

            </div>
        </div>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        Alejandro León Castro &copy;
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</body>
</html>
