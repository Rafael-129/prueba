@extends('layouts.headerProf') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Notas')

@section('content')
<div class="container">
        <h1>Listado de Notas</h1>

        <a href="{{ route('profesor.notas.create') }}" class="btn btn-primary mb-3">Agregar Nota</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Materia</th>
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
                            <a href="{{ route('profesor.notas.edit', $nota->idNotas) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('profesor.notas.destroy', $nota->idNotas) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection