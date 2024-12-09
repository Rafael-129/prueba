@extends('layouts.headerProf') 

@section('title', 'Contactos')

@section('content')
<div class="container">
    <h3 class="text-center mb-4">Consultas y Quejas</h3>

    <!-- Filtro por estado -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <form action="{{ route('profesor.quejas') }}" method="GET" class="mb-4">
            <div class="d-flex align-items-center">
                <select name="idEstadoConsulta" class="form-control mr-2">
                    <option value="">Todas las Consultas</option>
                    @foreach($estadoconsultas as $estadoconsulta)
                        <option value="{{ $estadoconsulta->idEstadoConsulta }}" 
                            @if(request('idEstadoConsulta') == $estadoconsulta->idEstadoConsulta) selected @endif>
                            {{ $estadoconsulta->estado }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </form>
    </div>
    
    @if ($consultas->isEmpty())
        <p class="text-center">No hay consultas ni quejas registradas.</p>
    @else
        @foreach ($consultas as $consulta)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Consulta/Queja de: {{ $consulta->nombres }} {{ $consulta->apellidoPaterno }} {{ $consulta->apellidoMaterno }} </strong>
                </div>
                <div class="card-body">
                    <p> <strong>Queja:</strong> {{ $consulta->descripcion }} </p>
                    <p><strong>Fecha de lo sucedido:</strong> {{ $consulta->fechaEnvio }}</p>
                    <p><strong>Fecha de Respuesta:</strong> {{ $consulta->fechaRespuesta }}</p>
                    <p><strong>Fecha de Creación:</strong> {{ $consulta->created_at }}</p> <!-- Mostrar la fecha de creación -->
                    <p><strong>Estado:</strong> {{ $consulta->estadoConsulta->estado }}
                        <div class="flex items-center">
                        <form action="{{ route('actualizarEstado', $consulta->idConsultas) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="idEstadoConsulta" class="border rounded px-3 py-2 text-gray-700">
                                @foreach($estadoconsultas as $estadoconsulta)
                                    <option value="{{ $estadoconsulta->idEstadoConsulta }}" 
                                        @if($consulta->idEstadoConsulta == $estadoconsulta->idEstadoConsulta) selected @endif>
                                        {{ $estadoconsulta->estado }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="mt-2 bg-blue-500 text-white rounded px-4 py-2">Actualizar</button>
                        </form>
                        </div>
                    </p>
                    @if ($consulta->respuesta)
                        <p><strong>Respuesta:</strong> {{ $consulta->respuesta }}</p>
                    @else
                        <p><strong>Sin respuesta aún</strong></p>
                    @endif
                    <form action="{{ route('responderConsulta', $consulta->idConsultas) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="respuesta">Respuesta</label>
                            <textarea class="form-control" name="respuesta" rows="3" placeholder="Escriba su respuesta aquí..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Responder</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection

@push('styles')
<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
    }
    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .card-body {
        padding: 15px;
    }
    .card-title {
        font-size: 18px;
        font-weight: 600;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

</style>
@endpush