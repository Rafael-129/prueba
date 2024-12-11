<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlus Intranet</title>
    <link rel="shortcut icon" href="{{ asset('images/logo_eduplus.jpeg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    /* CSS Global */
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    /* Encabezado */
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

    /* Contenido Principal */
    .contenido {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* Pie de Página */
    .pie-pagina {
        background-color: #1F308A; 
        color: white;
        text-align: center;
        padding: 50px;
        font-size: 14px;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        width: 100%;
    }

    .logopie {
        width: 20%; 
        height: 100px; 
        margin: 0 auto; 
        display: block;
    }

    .card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }

    .card .card-footer {
        background-color: #f8f9fa;
    }

    .btn {
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        opacity: 0.9;
    }

    </style>
</head>
<body>
    <!-- Encabezado -->
    <nav class="navbar navbar-expand-lg encabezado">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('Alumno.anuncios') }}">
                <img src="{{ asset('images/logo_eduplus.jpeg') }}" alt="Emilio del Solar Logo" class="logo" width="100" height="auto">
                <span class="titulo ms-2">EduPlus</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Alumno.anuncios') }}">Anuncios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Alumno.Citas') }}">Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Alumno.Conectados') }}">Conectados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Alumno.notas') }}">Notas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Intranet
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarUserDropdown">
                            
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
    <div class="contenido">
        @yield('content') 
    </div>
    
    <!-- Pie de Página -->
    <div class="pie-pagina">

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
