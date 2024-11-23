@extends('layouts.headerIntra')


@section('title', 'Mis Citas')


@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">Mis Citas</h1>

        <h2 class="text-2xl font-semibold mb-4">Citas Programadas</h2>
        @if($citas->isNotEmpty())
            <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border border-gray-200">Fecha</th>
                        <th class="px-4 py-2 border border-gray-200">Hora</th>
                        <th class="px-4 py-2 border border-gray-200">Profesor</th>
                        <th class="px-4 py-2 border border-gray-200">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($citas as $cita)
                        <tr class="bg-gray-100 hover:bg-gray-200">
                            <td class="px-4 py-2 border border-gray-200">{{ $cita->fechaReserva }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $cita->horaReserva }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $cita->nombre }} {{ $cita->apellido }}</td>
                            <td class="px-4 py-2 border border-gray-200">{{ $cita->estado }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="mt-4 text-center">No tienes citas programadas.</p>
        @endif

        <h3 class="text-xl font-semibold mt-8 mb-4">Reservar Nueva Cita</h3>
        
        <form action="{{ route('Alumno.reservarCita') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="fechaReserva" class="block font-medium">Fecha de Reserva:</label>
                <input type="date" name="fechaReserva" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div>
                <label for="horaReserva" class="block font-medium">Hora de Reserva:</label>
                <select name="horaReserva" class="w-full p-2 border border-gray-300 rounded" required>
                    <option value="12:00:00">12:00 - 12:30</option>
                    <option value="18:00:00">18:00 - 18:30</option>
                </select>
            </div>
            <div>
                <label for="idProfesor" class="block font-medium">Seleccionar Profesor:</label>
                <select name="idProfesor" class="w-full p-2 border border-gray-300 rounded" required>
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->idProfesor }}">{{ $profesor->nombre }} {{ $profesor->apellido }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="descargo" class="block font-medium">Descargo:</label>
                <textarea name="descargo" class="w-full p-2 border border-gray-300 rounded" rows="4" placeholder="Escribe tu descargo aquí (opcional)"></textarea>
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Reservar Cita</button>
        </form>
    </div>
@endsection