@extends('layouts.headerIntra')

@section('title', 'Notas')

@section('content')

<style>
    .table-primary {
    background-color: #dfe9f3;
    color: #1F308A;
    }

    .card-header {
    font-weight: bold;
    text-transform: uppercase;
    }

    .card-body {
    font-size: 14px;
    }

    .table th, .table td {
    text-align: center;
    }

    .btn-danger {
    background-color: #FF5B5B;
    border-color: #FF5B5B;
    font-weight: bold;
    }

    .btn-danger:hover {
    background-color: #E24444;
}
</style>

<div class="container mt-4">
  <!-- Información General -->
  <div class="card mb-4 shadow-sm">
    <div class="card-header text-white bg-primary">
      Información General
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 mb-2">
          <strong>Alumno:</strong> {{ $alumno->nombre }} {{ $alumno->apellido }}
        </div>
        <div class="col-md-6 mb-2">
          <strong>Sección:</strong> {{ $alumno->grado }}
        </div>
        <div class="col-md-6 mb-2">
          <strong>Grado:</strong> {{ $alumno->grado }}
        </div>
        <div class="col-md-6 mb-2">
          <strong>Periodo Académico:</strong> {{ $alumno->fecha }}
        </div>
        <div class="col-md-6">
          <strong>Código:</strong> {{ $alumno->idAlumno }}
        </div>
      </div>
    </div>
  </div>

  <!-- Relación de Cursos -->
  <div class="card mb-4 shadow-sm">
    <div class="card-header text-white bg-primary">
      Relación de Cursos
    </div>
    <div class="card-body">
      <table class="table table-bordered align-middle">
        <thead class="table-primary text-center">
          <tr>
            <th>Sel.</th>
            <th>Periodo</th>
            <th>Código</th>
            <th>Curso</th>
          </tr>
        </thead>
        <tbody>
            @foreach($alumno->notas as $nota)
            <tr>
              <td class="text-center"><input type="radio" name="curso"></td>
              <td>{{ $alumno->fecha }}</td>
              <td>{{ $alumno->idAlumno }}</td>
              <td>{{ $nota->curso->nombreCurso ?? 'Sin curso asignado' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <button class="btn btn-danger mt-3 w-100">Consultar Detalle</button>
    </div>
  </div>

  <!-- Detalle de Curso -->
  <div class="card mb-4 shadow-sm">
    <div class="card-header text-white bg-primary">
      Detalle de Curso: 
    </div>
    <div class="card-body">
      <table class="table table-bordered align-middle">
        <thead class="table-primary text-center">
          <tr>
            <th>Examen</th>
            <th>Nota</th>
          </tr>
        </thead>
        <tbody>
          @foreach($notas as $nota)
            <tr>
              <td>{{ $nota->materia }}</td>
              <td>{{ $nota->nota }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <p class="text-center fw-bold fs-5 mt-3">Promedio: {{ $notas->avg('nota') }}</p>
    </div>
  </div>
</div>
@endsection
