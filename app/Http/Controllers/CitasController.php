<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Profesor;
use App\Models\EstadoReserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CitasController extends Controller
{
    // Mostrar citas del alumno autenticado
    public function mostrarCitas()
    {
    $AlumnoId = auth()->id(); // Cambiar según tu lógica de autenticación

    // Obtener las citas del alumno con relaciones
    $citas = Reserva::with(['estadoReserva', 'profesor'])
        ->where('idAlumno', $AlumnoId)
        ->get();

    // Obtener todos los estados de las reservas
    $estados = EstadoReserva::all();

    // Obtener todos los profesores para el formulario de reserva
    $profesores = Profesor::all();

    // Pasar las variables necesarias a la vista
    return view('Alumno.Citas', compact('citas', 'estados', 'profesores'));
    }

    // Reservar cita
    public function reservarCita(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fechaReserva' => 'required|date',
            'horaReserva' => 'required',
            'idProfesor' => 'required|exists:profesor,idProfesor',
            'descargo' => 'nullable|string|max:255',
        ]);
        // Crear una nueva reserva en la base de datos
        Reserva::create([
            'fechaReserva' => $request->fechaReserva,
            'horaReserva' => $request->horaReserva,
            'idProfesor' => $request->idProfesor,
            'idAlumno' => auth()->id(), // ID del alumno autenticado
            'idEstadoReserva' => 1, // Estado inicial: "Pendiente"
            'descargo' => $request->descargo,
        ]);
        return back()->with('success', 'Cita reservada con éxito.');
        
    }
}

