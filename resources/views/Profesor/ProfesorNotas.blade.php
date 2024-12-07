@extends('layouts.headerProf')

@section('title', 'Notas')

@section('content')
<div class="container">
    <h1>Listado de Notas</h1>

    <div class="d-flex align-items-center justify-content-between mb-3">
        <!-- Filtro por Alumno -->
        <form action="{{ route('profesor.notas.index') }}" method="GET" class="d-flex">
            <select name="alumno_id" class="form-control form-control-sm me-2">
                <option value="">Seleccionar Alumno</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->idAlumno }}" {{ request('alumno_id') == $alumno->idAlumno ? 'selected' : '' }}>
                        {{ $alumno->nombre }} {{ $alumno->apellido }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-secondary btn-sm">Filtrar</button>
        </form>

        <!-- Botón "Agregar Nota" alineado a la izquierda -->
        <a href="{{ route('profesor.notas.create') }}" class="btn btn-primary btn-sm">Agregar Nota</a>
    </div>

    <!-- Tabla con Notas -->
    <table class="table table-striped table-hover" id="tablaNotas">
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Práctica</th>
                <th>Nota</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <td>{{ $nota->alumno->nombre }} {{ $nota->alumno->apellido }}</td>
                    <td>{{ $nota->materia }}</td>
                    <td>{{ $nota->nota }}</td>
                    <td>{{ $nota->curso->nombreCurso }}</td>
                    <td>
                        <a href="{{ route('profesor.notas.edit', $nota->idNotas) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                        <form action="{{ route('profesor.notas.destroy', $nota->idNotas) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
