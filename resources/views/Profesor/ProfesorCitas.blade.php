@extends('layouts.headerProf') <!-- Asegúrate de usar el nombre correcto del archivo de layout -->

@section('title', 'Citas')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>

<div class="container mx-auto p-4">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif


    <style>
    #calendar {
        max-width: 600px;
        margin: 0 auto;
        font-size: 0.8rem; /* Ajustar el tamaño del texto */
    }
    </style>
    <div class="container mt-5">
        <h1 class="text-2xl font-bold mb-4 text-center">Disponibilidad del Profesor</h1>
        <button id="showCalendarButton" class="btn btn-primary mb-3">Seleccionar tus días no disponibles</button>
        
        <!-- Sección del calendario (invisible inicialmente) -->
        <div id="calendarSection" style="display: none;">
            <div id="calendar"></div> <!-- Aquí se mostrará el calendario -->

            <!-- Botones debajo del calendario -->
            <div class="mt-3">
                <button id="saveDaysButton" class="btn btn-success" disabled>Guardar días no disponibles</button>
                <button id="cancelSelectionButton" class="btn btn-secondary">Cancelar</button>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendar; // Instancia del calendario
            let selectedDates = []; // Fechas seleccionadas

            const showCalendarButton = document.getElementById('showCalendarButton');
            const calendarSection = document.getElementById('calendarSection');
            const saveDaysButton = document.getElementById('saveDaysButton');
            const cancelSelectionButton = document.getElementById('cancelSelectionButton');

            // Mostrar el calendario cuando se haga clic en el botón
            showCalendarButton.addEventListener('click', function () {
                calendarSection.style.display = 'block'; // Mostrar la sección del calendario

                const calendarEl = document.getElementById('calendar');

                if (!calendar) {
                    calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        locale: 'es',
                        selectable: true, // Permitir selección
                        dateClick: function (info) {
                            const dateStr = info.dateStr;

                            // Alternar selección
                            if (selectedDates.includes(dateStr)) {
                                selectedDates = selectedDates.filter(date => date !== dateStr);
                                info.dayEl.style.backgroundColor = ''; // Quitar color de selección
                            } else {
                                selectedDates.push(dateStr);
                                info.dayEl.style.backgroundColor = '#007bff'; // Marcar de color
                            }

                            console.log('Fechas seleccionadas:', selectedDates);

                            // Habilitar el botón Guardar si hay fechas seleccionadas
                            saveDaysButton.disabled = selectedDates.length === 0;
                        },
                    });

                    calendar.render();
                }
            });

            // Cancelar selección y ocultar el calendario
            cancelSelectionButton.addEventListener('click', function () {
                calendarSection.style.display = 'none'; // Ocultar la sección del calendario
                selectedDates = []; // Limpiar fechas seleccionadas
                saveDaysButton.disabled = true; // Deshabilitar el botón Guardar

                // Restaurar colores
                const dayEls = calendarEl.querySelectorAll('.fc-daygrid-day');
                dayEls.forEach(dayEl => dayEl.style.backgroundColor = '');
            });

            // Guardar las fechas seleccionadas
            saveDaysButton.addEventListener('click', function () {
                if (selectedDates.length > 0) {
                    console.log("Fechas enviadas:", selectedDates);
                    
                    // Obtener el CSRF token desde el meta tag
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    // Realizar la solicitud AJAX para guardar las fechas
                    fetch("{{ route('guardar.dias') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        body: JSON.stringify({ fechas: selectedDates }), // Enviar las fechas seleccionadas
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message); // Mostrar mensaje de éxito
                        if (data.message === 'Fechas guardadas exitosamente.') {
                            calendarSection.style.display = 'none'; // Ocultar calendario después de guardar
                            selectedDates = []; // Limpiar fechas
                            saveDaysButton.disabled = true; // Deshabilitar el botón Guardar
                        }
                    })
                    .catch(error => {
                        console.error('Error al guardar las fechas:', error);
                        alert('Hubo un error al guardar las fechas.');
                    });
                } else {
                    alert('Por favor, seleccione al menos un día.');
                }
            });
        });
    </script>



    <!-- Citas Pendientes -->
    <h1 class="text-2xl font-bold mb-4 text-center">Citas Pendientes</h1>
    <div class="bg-white shadow-lg rounded-lg p-6">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-100">
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
</div>

@endsection
