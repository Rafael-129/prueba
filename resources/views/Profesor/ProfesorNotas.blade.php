@extends('layouts.headerProf') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Notas')

@section('content')
<div class="container">
    <h1>Listado de Notas</h1>

    <div class="d-flex align-items-center justify-content-between mb-3">
        <!-- Botón "Agregar Nota" alineado a la izquierda -->
        <a href="{{ route('profesor.notas.create') }}" class="btn btn-primary btn-sm">Agregar Nota</a>

        <!-- Select para alumnos alineado a la derecha -->
        <select id="selectAlumno" class="form-select" style="width: auto; padding: 5px; margin-left: auto;">
            <option value="" selected>Seleccionar Alumno</option>
            @foreach($alumnos as $alumno)
                <option value="{{ $alumno->idAlumno }}">{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tabla con Notas -->
    <table class="table table-striped table-hover" id="tablaNotas">
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
                <tr class="nota-row" data-alumno-id="{{ $nota->alumno->idAlumno }}">
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

<!-- Inicia Select2 -->
<script type="text/javascript">
    $(document).ready(function() {
        // Inicializa Select2 en el select con id 'selectAlumno'
        $('#selectAlumno').select2({
            placeholder: "Seleccionar Alumno",
            allowClear: true
        });

        // Filtrado de notas según el alumno seleccionado
        $('#selectAlumno').on('change', function() {
            var alumnoId = $(this).val();
            
            if (alumnoId) {
                // Si se seleccionó un alumno, solo mostrar las notas de ese alumno
                $('#tablaNotas .nota-row').each(function() {
                    var rowAlumnoId = $(this).data('alumno-id');
                    if (rowAlumnoId == alumnoId) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            } else {
                // Si no se seleccionó ningún alumno, mostrar todas las filas
                $('#tablaNotas .nota-row').show();
            }
        });
    });
</script>
@endsection
