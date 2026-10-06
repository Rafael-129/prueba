<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios | EduPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Usuarios</h1>
            <div>
                <a class="btn btn-outline-secondary" href="{{ route('admin.dashboard') }}">Panel</a>
                <a class="btn btn-primary" href="{{ route('admin.usuarios.create') }}">Crear usuario</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>Rol</th>
                            <th>Perfil</th>
                            <th>Grado y sección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->idUsuario }}</td>
                                <td>{{ $usuario->DNI }}</td>
                                <td>{{ $usuario->rol?->nombre ?? 'Sin rol' }}</td>
                                <td>
                                    @if ($usuario->alumno)
                                        {{ $usuario->alumno->nombre }} {{ $usuario->alumno->apellido }}
                                    @elseif ($usuario->profesor)
                                        {{ $usuario->profesor->nombre }} {{ $usuario->profesor->apellido }}
                                    @else
                                        Sin perfil
                                    @endif
                                </td>
                                <td>
                                    @if ($usuario->alumno?->grado)
                                        {{ $usuario->alumno->grado->Grado }} - {{ $usuario->alumno->grado->Seccion }}
                                    @elseif ($usuario->profesor?->grado)
                                        {{ $usuario->profesor->grado->Grado }} - {{ $usuario->profesor->grado->Seccion }}
                                    @else
                                        Sin asignar
                                    @endif
                                </td>
                                <td>
                                    @if ($usuario->alumno || $usuario->profesor)
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.usuarios.grado.edit', $usuario) }}">
                                            Asignar grado
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-muted">No hay usuarios registrados.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>