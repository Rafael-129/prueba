<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Profesor;
use App\Models\Alumno;
use App\Models\EstadoReserva;
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
    
        // Obtener el idAlumno basado en el usuario autenticado
        $alumno = Alumno::where('idUsuario', auth()->id())->first();
    
        // Verificar si el alumno existe
        if (!$alumno) {
            return back()->withErrors(['error' => 'No se encontró un alumno asociado con el usuario actual.']);
        }
    
        // Crear una nueva reserva en la base de datos
        Reserva::create([
            'fechaReserva' => $request->fechaReserva,
            'horaReserva' => $request->horaReserva,
            'idProfesor' => $request->idProfesor,
            'idAlumno' => $alumno->idAlumno, // Usar el idAlumno obtenido
            'idEstadoReserva' => 1, // Estado inicial: "Pendiente"
            'descargo' => $request->descargo,
        ]);
    
        return back()->with('success', 'Cita reservada con éxito.');
    }
    
}

