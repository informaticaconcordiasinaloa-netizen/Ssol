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

            <div class="user-info">
                @auth
                    <p>👤 {{ Auth::user()->name }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm w-100">Cerrar sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm w-100">Iniciar sesión</a>
                @endauth
            </div>
        </div>
    @endif

    {{-- Contenido principal --}}
    <div class="content @if(request()->is('login')) login-page @endif">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
