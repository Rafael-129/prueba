@extends('layouts.headerIntra')

@section('title', 'Contactos')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-center">Consultas y Quejas</h3>
        <!-- Botón "Conectados" -->
        <a href="{{ route('Alumno.quejas') }}" class="btn btn-primary">Contactanos</a>
    </div>

    <!-- Filtro por estado -->
    @if ($consultas->isEmpty())
        <p class="text-center">No hay consultas ni quejas registradas.</p>
    @else
        @foreach ($consultas as $consulta)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Consulta/Queja de: {{ $consulta->nombres }} {{ $consulta->apellidoPaterno }} {{ $consulta->apellidoMaterno }} </strong>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $consulta->descripcion }}</h5>
                    <p><strong>Fecha de lo sucedido:</strong> {{ $consulta->fechaEnvio }}</p>
                    <p><strong>Fecha de Respuesta:</strong> {{ $consulta->fechaRespuesta }}</p>
                    <p><strong>Estado:</strong> {{ $consulta->estadoConsulta->estado }}</p> 
                    
                    @if ($consulta->respuesta)
                        <p><strong>Respuesta del Profesor: </p> </strong>
                            {{ $consulta->respuesta }}
                    @else
                        <p><strong>Sin respuesta aún</strong></p>
                    @endif
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
</style>
@endpush
