<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | EduPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand">EduPlus · Administración</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light" type="submit">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <main class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1">Panel administrativo</h1>
                <p class="text-muted mb-0">Gestiona los datos principales de EduPlus.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('admin.usuarios.create') }}">Crear usuario</a>
        </div>

        <div class="row g-3 mb-4">
            @foreach([
                ['label' => 'Usuarios', 'value' => $usuarios],
                ['label' => 'Alumnos', 'value' => $alumnos],
                ['label' => 'Profesores', 'value' => $profesores],
                ['label' => 'Grados y secciones', 'value' => $grados],
            ] as $card)
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="text-muted">{{ $card['label'] }}</div>
                            <div class="display-6 fw-semibold">{{ $card['value'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="h5">Módulos administrativos</h2>
                <p class="text-muted mb-0">Usuarios está disponible ahora. Notas, reclamos, eventos y cursos se conectarán al mismo panel.</p>
                <a class="btn btn-outline-primary mt-3" href="{{ route('admin.usuarios.index') }}">Ver usuarios</a>
            </div>
        </div>
    </main>
</body>
</html>