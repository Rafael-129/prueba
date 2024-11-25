@extends('layouts.headerProf') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Contactos')

@section('content')
<div class="container">
        <h1>Crear Nota</h1>

        <form action="{{ route('profesor.notas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="materia" class="form-label">Practica</label>
                <input type="text" class="form-control" id="materia" name="materia" required>
            </div>

            <div class="mb-3">
                <label for="nota" class="form-label">Nota</label>
                <input type="number" class="form-control" id="nota" name="nota" min="0" max="20" required>
            </div>

            <div class="mb-3">
                <label for="idAlumnos" class="form-label">Alumno</label>
                <select class="form-control" id="idAlumnos" name="idAlumnos" required>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->idAlumno }}">{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="idCursos" class="form-label">Curso</label>
                <select class="form-control" id="idCursos" name="idCursos" required>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->idCursos }}">{{ $curso->nombreCurso }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Nota</button>
        </form>
    </div>
@endsection