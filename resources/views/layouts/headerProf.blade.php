<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlus Intranet - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo_eduplus.jpeg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* CSS de Encabezado */
        .encabezado {
            background-color: #1F308A;
            color: white;
        }

        .titulo {
            font-size: 24px;
            color: white;
            font-weight: bold;
            margin: 0;
            padding-left: 5px;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: bold;
            margin-right: 15px; /* Espacio entre los elementos del menú */
        }

        .navbar-nav .nav-link:hover {
            text-decoration: underline;
        }

        .intranet {
            background-color: #C00;
            padding: 5px 10px;
            border-radius: 5px;
            color: white !important;
        }

        .intranet:hover {
            background-color: #900;
        }

        /* Pie de Página */
        .pie-pagina {
            background-color: #1F308A; 
            color: white;
            text-align: center;
            padding: 50px;
            width: 100%;
            font-size: 14px;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }

        .logopie {
            width: 20%; 
            height: 100px; 
            margin: 0 auto; 
            display: block;
        }
    </style>
</head>
<body>
<body class="d-flex flex-column" style="min-height: 100vh;">
    <!-- Encabezado -->
    <nav class="navbar navbar-expand-lg encabezado">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('anuncios_profs.index') }}">
                <img src="{{ asset('images/logo_eduplus.jpeg') }}" alt="Emilio del Solar Logo" class="logo" width="100" height="auto">
                <span class="titulo ms-2">EduPlus</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('anuncios_profs.index') }}">Anuncios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Profesor.Citas') }}">Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Profesor.quejas') }}">Conectados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Profesor.Notas') }}">Notas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Registro') }}">Registrar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/user-icon.png') }}" alt="Usuario" width="30" height="30" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUserDropdown">
                            <li><a class="dropdown-item" href="">Perfil</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Contenido Principal -->
    <div class="contenido flex-grow-1">
        @yield('content') <!-- Aquí se incluirá el contenido específico de cada página -->
        @yield('body')
    </div>

    <!-- Pie de Página -->
    <div class="pie-pagina">

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
