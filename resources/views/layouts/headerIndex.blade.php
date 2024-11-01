<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .encabezado {
            background-color: #1F308A;
            padding: 10px 20px;
            color: white;
        }

        .contenedor-logo {
            display: flex; 
            align-items: center; 
        }

        .logo {
            width: 60px; 
            height: auto;
            margin-right: 10px;
        }

        .titulo {
            font-size: 24px;
            margin: 0;
            color: white;
            font-weight: bold;
        }

        .navegacion {
            display: flex;
            gap: 20px;
            align-items: center; 
        }

        .navegacion a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 0 15px;
        }

        .navegacion .intranet {
            background-color: #C00;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
        }

        .navegacion .intranet:hover {
            background-color: #900;
        }

        .navegacion a:hover {
            text-decoration: underline;
        }

        /* Pie de Página */
        .pie-pagina {
            background-color: #1F308A; 
            color: white;
            text-align: center;
            padding: 15px;
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
    <!-- Encabezado -->
    <nav class="navbar navbar-expand-lg encabezado">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Emilio del Solar Logo" class="logo">
                <span class="titulo ms-2">EduPlus</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navegacion">
                    <a href="{{ route('index.propuestas_educativas') }}">Propuesta Educativa</a>
                    <a href="{{ route('index.nosotros') }}">Nosotros</a>
                    <a href="{{ route('index.anuncios') }}">Anuncios</a>
                    <a href="{{ route('index.contactanos') }}">Contáctenos</a>
                    <a href="{{ route('Login') }}" class="intranet">INTRANET</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="contenido flex-grow-1">
        @yield('content') <!-- Aquí se incluirá el contenido específico de cada página -->
    </div>
    
    <!-- Pie de Página -->
    <div class="pie-pagina">
        <img src="{{ asset('images/pie.jpeg') }}" alt="Emilio del Solar" class="logopie">   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
