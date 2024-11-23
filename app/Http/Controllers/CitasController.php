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
        $citas = Reserva::with(['profesor', 'estadoReserva'])
            ->where('idAlumno', auth()->user()->id)
            ->get();

        $profesores = Profesor::all();

        return view('Alumno.citas', compact('citas', 'profesores'));
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