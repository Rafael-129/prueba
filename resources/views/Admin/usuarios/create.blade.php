<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario | EduPlus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-4" style="max-width: 760px">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Crear usuario</h1>
            <a class="btn btn-outline-secondary" href="{{ route('admin.usuarios.index') }}">Volver</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.usuarios.store') }}" class="card card-body shadow-sm">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label" for="nombre">Nombre</label>
                    <input class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="apellido">Apellido</label>
                    <input class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="DNI">DNI</label>
                    <input class="form-control" id="DNI" name="DNI" value="{{ old('DNI') }}" maxlength="8" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="rol">Tipo de usuario</label>
                    <select class="form-select" id="rol" name="rol" required>
                        <option value="">Selecciona un rol</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->idRol }}" @selected(old('rol') == $rol->idRol)>{{ $rol->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="idGrado">Grado y sección</label>
                    <select class="form-select" id="idGrado" name="idGrado" required>
                        <option value="">Selecciona un grado</option>
                        @foreach ($grados as $grado)
                            <option value="{{ $grado->idGrado }}" @selected(old('idGrado') == $grado->idGrado)>
                                {{ $grado->Grado }} - Sección {{ $grado->Seccion }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="departamento">Departamento <span class="text-muted">(profesor)</span></label>
                    <input class="form-control" id="departamento" name="departamento" value="{{ old('departamento') }}">
                </div>
                <div class="col-12">
                    <label class="form-label" for="especialidad">Especialidad <span class="text-muted">(profesor)</span></label>
                    <input class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="password">Contraseña</label>
                    <input class="form-control" id="password" name="password" type="password" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="password_confirmation">Confirmar contraseña</label>
                    <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required>
                </div>
            </div>
            <button class="btn btn-primary mt-4" type="submit">Crear usuario</button>
        </form>
    </main>
</body>
</html>