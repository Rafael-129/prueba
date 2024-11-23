@extends('layouts.headerProf') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Citas')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Citas Pendientes</h1>
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
   
    <div class="bg-white shadow-xl rounded-lg p-6">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left">Fecha</th>
                    <th class="px-4 py-2 text-left">Hora</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Alumno</th>
                    <th class="px-4 py-2 text-left">Descargo</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $cita->fechaReserva }}</td>
                        <td class="px-4 py-2">{{ $cita->horaReserva }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-block px-2 py-1 text-sm rounded-full 
                                {{ $cita->estadoReserva->estado == 'Pendiente' ? 'bg-yellow-200 text-yellow-800' : 
                                ($cita->estadoReserva->estado == 'Confirmada' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800') }}">
                                {{ $cita->estadoReserva->estado }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $cita->alumno->nombre }} {{ $cita->alumno->apellido }}</td>
                        <td class="px-4 py-2">{{ $cita->descargo ?? 'Sin descargo' }}</td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('profesor.citas.update', $cita->idReservas) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <select name="idEstadoReserva" class="border rounded px-3 py-2 text-gray-700">
                                    <option value="1" {{ $cita->idEstadoReserva == 1 ? 'selected' : '' }}>Pendiente</option>
                                    <option value="2" {{ $cita->idEstadoReserva == 2 ? 'selected' : '' }}>Confirmada</option>
                                    <option value="3" {{ $cita->idEstadoReserva == 3 ? 'selected' : '' }}>Cancelar</option>
                                </select>
                                <button type="submit" class="mt-2 bg-blue-500 text-white rounded px-4 py-2">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
