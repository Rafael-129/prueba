<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar grado | EduPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4" style="max-width: 640px">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1">Asignar grado y sección</h1>
                <p class="text-muted mb-0">{{ $usuario->DNI }}</p>
            </div>
            <a class="btn btn-outline-secondary" href="{{ route('admin.usuarios.index') }}">Volver</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.usuarios.grado.update', $usuario) }}" class="card card-body shadow-sm">
            @csrf
            @method('PUT')
            <label class="form-label" for="idGrado">Grado y sección</label>
            <select class="form-select" id="idGrado" name="idGrado" required>
                @foreach ($grados as $grado)
                    <option value="{{ $grado->idGrado }}" @selected((string) $idGradoActual === (string) $grado->idGrado)>
                        {{ $grado->Grado }} - Sección {{ $grado->Seccion }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-primary mt-4" type="submit">Guardar asignación</button>
        </form>
    </main>
</body>
</html>