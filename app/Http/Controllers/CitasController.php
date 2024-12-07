<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Profesor;
use App\Models\Alumno;
use App\Models\EstadoReserva;
use App\Models\DisponibilidadProfesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CitasController extends Controller
{

    public function mostrarCitas()
    {
        // Obtener el idAlumno basado en el usuario autenticado
        $alumno = Alumno::where('idUsuario', auth()->id())->first();
    
        // Verificar si el alumno existe
        if (!$alumno) {
            return back()->withErrors(['error' => 'No se encontró un alumno asociado con el usuario actual.']);
        }
    
        // Obtener las citas del alumno con relaciones
        $citas = Reserva::with(['estadoReserva', 'profesor'])
            ->where('idAlumno', $alumno->idAlumno) // Usar el idAlumno
            ->get();
    
        // Obtener todos los estados de las reservas
        $estados = EstadoReserva::all();
    
        // Obtener todos los profesores para el formulario de reserva
        $profesores = Profesor::all();
    
        // Pasar las variables necesarias a la vista
        return view('Alumno.Citas', compact('citas', 'estados', 'profesor'));
    }
 
    public function mostrarFormularioReserva(Request $request)
    {
        // Obtener los profesores disponibles
        $profesores = Profesor::all();

        return view('Alumno.Citas', compact('profesorres'));
    }

    // Obtener las fechas de disponibilidad para un profesor
    public function obtenerFechasDisponibles(Request $request)
    {
        $idProfesor = $request->idProfesor;

        // Obtener las fechas no disponibles del profesor seleccionado
        $fechasNoDisponibles = DisponibilidadProfesor::where('idProfesor', $idProfesor)
            ->pluck('fecha') // Asegúrate de que esta columna exista en tu tabla
            ->toArray();

        return response()->json($fechasNoDisponibles);
    }

    // Reservar una nueva cita
    public function reservarCita(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fechaReserva' => 'required|date',
            'horaReserva' => 'required',
            'idProfesor' => 'required|exists:profesores,idProfesor',
            'descargo' => 'nullable|string|max:255',
        ]);

        // Obtener el idAlumno basado en el usuario autenticado
        $alumno = Alumno::where('idUsuario', auth()->id())->first();

        // Verificar si el alumno existe
        if (!$alumno) {
            return back()->withErrors(['error' => 'No se encontró un alumno asociado con el usuario actual.']);
        }

        // Verificar si la fecha está disponible para el profesor
        $fechaNoDisponible = Reserva::where('idProfesor', $request->idProfesor)
            ->where('fechaReserva', $request->fechaReserva)
            ->exists();

        if ($fechaNoDisponible) {
            return back()->withErrors(['error' => 'La fecha seleccionada no está disponible para este profesor.']);
        }

        // Crear una nueva reserva en la base de datos
        Reserva::create([
            'fechaReserva' => $request->fechaReserva,
            'horaReserva' => $request->horaReserva,
            'idProfesor' => $request->idProfesor,
            'idAlumno' => $alumno->idAlumno,
            'idEstadoReserva' => 1, // Estado inicial: "Pendiente"
            'descargo' => $request->descargo,
        ]);

        return back()->with('success', 'Cita reservada con éxito.');
    }
}

