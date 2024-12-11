 @extends('layouts.headerIntra')

@section('title', 'Mis Citas')


@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Mis Citas</h1>

    <!-- Formulario de Reservar Nueva Cita -->
    <div class="p-6 bg-gray-100 rounded-lg shadow-md mb-10">
        <h3 class="text-xl font-semibold mb-4">Reservar Nueva Cita</h3>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('Alumno.reservarCita') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="idProfesor" class="block font-medium">Seleccionar Profesor:</label>
                <select name="idProfesor" class="w-full p-2 border border-gray-300 rounded" required id="idProfesor">
                    <option value="" disabled selected>Seleccione un profesor</option>
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->idProfesor }}">{{ $profesor->nombre }} {{ $profesor->apellido }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="fechaReserva" class="block font-medium">Fecha de Reserva:</label>
                <input type="date" name="fechaReserva" class="w-full p-2 border border-gray-300 rounded" required id="fechaReserva" disabled>
            </div>
            
            <div>
                <label for="horaReserva" class="block font-medium">Hora de Reserva:</label>
                <select name="horaReserva" class="w-full p-2 border border-gray-300 rounded" required>
                    <option value="12:00">12:00 - 12:30</option>
                    <option value="18:00">18:00 - 18:30</option>
                </select>
            </div>

            <div>
                <label for="descargo" class="block font-medium">Descargo:</label>
                <textarea name="descargo" class="w-full p-2 border border-gray-300 rounded" rows="4" placeholder="Escribe tu descargo aquí (opcional)"></textarea>
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Reservar Cita</button>
        </form>

        <script>
            // Detectar el cambio de selección del profesor
            document.getElementById('idProfesor').addEventListener('change', function() {
                const idProfesor = this.value;

                // Si se selecciona un profesor, solicitar las fechas disponibles
                if (idProfesor) {
                    fetch(`/obtener-fechas-disponibles?idProfesor=${idProfesor}`)
                        .then(response => response.json())
                        .then(data => {
                            const fechasNoDisponibles = data;
                            const fechaInput = document.getElementById('fechaReserva');

                            // Habilitar el campo de fecha
                            fechaInput.disabled = false;

                            // Establecer las fechas no disponibles
                            fechaInput.setAttribute('min', new Date().toISOString().split('T')[0]);

                            // Bloquear las fechas no disponibles al cambiar la fecha
                            fechaInput.addEventListener('input', function() {
                                if (fechasNoDisponibles.includes(fechaInput.value)) {
                                    alert('Esta fecha no está disponible para el profesor seleccionado. Elija otra fecha.');
                                    fechaInput.value = ''; // Limpiar el valor si es una fecha no disponible
                                }
                            });

                            // También podemos pre-cargar el rango de fechas disponibles si es necesario
                            // Limpiar valores previos si se cambia de profesor
                            fechaInput.value = ''; // Limpiar el campo de fecha
                        });
                }
            });
        </script>
    </div>

    <!-- Tabla de Citas Programadas -->
    <div class="p-6 bg-gray-100 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Citas Programadas</h2>
        <table class="table-auto w-full border-collapse border border-gray-300">
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
                        <td class="px-4 py-2 border border-gray-200">{{ $cita->profesor->nombre }} {{ $cita->profesor->apellido }}</td>
                        <td class="px-4 py-2 border border-gray-200">{{ $cita->estadoReserva->estado }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>

@endsection
