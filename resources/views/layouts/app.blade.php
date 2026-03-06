<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 220px;
            background-color: #ffffff;
            padding: 1rem;
            border-right: 1px solid #dee2e6;
        }
        .sidebar a {
            display: block;
            color: #333;
            text-decoration: none;
            padding: 0.5rem 0;
            margin-bottom: 0.5rem;
            border-radius: 0.375rem;
        }
        .sidebar a:hover {
            background-color: #e9ecef;
        }
        .content {
            flex-grow: 1;
            padding: 2rem;
        }
        .user-info {
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #555;
        }
        /* Estilos especiales para la pantalla de login */
        .login-page {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .dropdown{
            margin-top: -200px;
        }
    </style>
</head>
<body>

    {{-- Mostrar menú solo si no estamos en /login --}}
    @if (!request()->is('login'))
        <div class="sidebar">
            <h5 class="mb-4">Menú</h5>
            <a href="/">Inicio</a>
            <a href="/suma">Aplicación de la suma</a>
            <a href="/productos">Productos</a>
            <a href="/departments">Departamentos</a>
        </div>
    @endif

    {{-- Contenido principal --}}
    <div class="content @if(request()->is('login')) login-page @endif">
        @yield('content')

        {{-- El ícono de usuario --}}
        @if (!request()->is('login'))
        <nav class="navbar navbar-light bg-light justify-content-end px-10">
            <div class="dropdown">
                <a class="d-flex align-items-center text-decoration-none dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                    <!-- Icono usuario -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle">
                        <path d="M11 10a3 3 0 1 1 2 0v1a4 4 0 1 1-2 0v-1z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>

                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    @auth
                    <li class="px-3 py-2">
                        <strong>{{ Auth::user()->name }}</strong><br>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    </li>
                    @endauth

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item text-danger">
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @endif
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
