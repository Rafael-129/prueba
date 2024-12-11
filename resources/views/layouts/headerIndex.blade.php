<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emilio del solar</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
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
            <a class="navbar-brand d-flex align-items-center" href="{{ route('index.propuestas_educativas') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Emilio del Solar Logo" class="logo" width="60" height="auto">
                <span class="titulo ms-2">Emilio del solar</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.propuestas_educativas') }}">Propuesta Educativa</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.nosotros') }}">Nosotros</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.anuncios') }}">Publicaciones</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('index.contactanos') }}">Contáctenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link intranet" href="{{ route('Login') }}">Intranet</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="contenido flex-grow-1">
        @yield('content') 
    </div>
    
    <!-- Pie de Página -->
    <footer class="py-5" style="background-color: #192C73; color: white;">
        <div class="container">
            <div class="row">
                <!-- Descripción -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase font-weight-bold">Sobre Edu Plus</h5>
                    <p class="small">
                        Edu Plus es una plataforma educativa diseñada para conectar a estudiantes, docentes y padres, ofreciendo herramientas modernas para el aprendizaje.
                    </p>
                    <img src="{{ asset('images/pie.jpeg') }}" alt="Logo Edu Plus" class="img-fluid mt-3" style="max-width: 120px;">
                </div>

                <!-- Enlaces Rápidos -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase font-weight-bold">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a class="nav-link text-light text-decoration-none" href="{{ route('index.propuestas_educativas') }}">Propuesta Educativa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light text-decoration-none" href="{{ route('index.nosotros') }}">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light text-decoration-none" href="{{ route('index.anuncios') }}">Publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light text-decoration-none" href="{{ route('index.contactanos') }}">Contáctenos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light text-decoration-none" href="{{ route('Login') }}">Intranet</a>
                        </li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase font-weight-bold">Contáctanos</h5>
                    <p class="small mb-1">📞 Teléfono: +51 950 861 034</p>
                    <p class="small mb-1">📧 Email: Emiliodelsolar@gmail.edu.pe</p>
                    <p class="small">📍 Dirección: Lima, Chosica, Perú</p>
                    <h6 class="mt-3">Síguenos</h6>
                    <div class="d-flex">
                        <!-- Redes Sociales con SVG -->
                        <a href="https://facebook.com" target="_blank" class="me-3">
                            <img src="{{ asset('images/face.jpg') }}" alt="Facebook" style="width: 32px;">
                        </a>
                        <a href="https://twitter.com" target="_blank" class="me-3">
                            <img src="{{ asset('images/tw.jpg') }}" alt="Twitter" style="width: 60px;">
                        </a>
                        <a href="https://instagram.com" target="_blank" class="me-3">
                            <img src="{{ asset('images/insta.jpg') }}" alt="Instagram" style="width: 32px;">
                        </a>
                        <a href="https://linkedin.com" target="_blank">
                            <img src="{{ asset('images/link.jpg') }}" alt="LinkedIn" style="width: 32px;">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Derechos Reservados -->
            <div class="row mt-4 border-top pt-3">
                <div class="col text-center">
                    <p class="small mb-0">© 2024 Edu Plus. Todos los derechos reservados.</p>
                    <p class="small">Desarrollado por el equipo de Edu Plus</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
