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
        // Verificamos si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes estar autenticado para ver tus citas.');
        }

        // Obtener las citas del alumno autenticado
        $citas = Reserva::with(['profesor', 'estadoReserva'])
            ->where('idAlumno', auth()->id()) // Filtra por el alumno autenticado
            ->get();

        // Obtener todos los profesores
        $profesores = Profesor::all(); 

        // Enviar las citas y los profesores a la vista
        return view('Alumno.citas', compact('citas', 'profesores'));
    }
    // Reservar cita
    public function reservarCita(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fechaReserva' => 'required|date',
            'horaReserva' => 'required',
            'nombreProfesor' => 'required|exists:profesores,nombre',  // Validamos que el nombre del profesor exista
            'descargo' => 'nullable|string|max:255',
        ]);

        // Verificamos si el usuario está autenticado
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Debes estar autenticado para realizar una reserva.');
        }

        // Obtener el ID del alumno autenticado
        $idAlumno = auth()->id();

        // Verificamos si el estado de la reserva está bien definido (Estado "Pendiente")
        $estadoReserva = EstadoReserva::find(1); // Estado "Pendiente"
        if (!$estadoReserva) {
            return back()->with('error', 'No se pudo encontrar el estado de reserva.');
        }

        // Buscar el profesor por nombre
        $profesor = Profesor::where('nombre', $request->nombreProfesor)->first();
        
        if (!$profesor) {
            return back()->with('error', 'No se encontró el profesor.');
        }

        // Intentar guardar la reserva
        try {
            Reserva::create([
                'fechaReserva' => $request->fechaReserva,
                'horaReserva' => $request->horaReserva,
                'idProfesor' => $profesor->idProfesor,  // Usamos el ID del profesor encontrado
                'idAlumno' => $idAlumno, // ID del alumno autenticado
                'idEstadoReserva' => $estadoReserva->idEstadoReserva, // Usamos el estado "Pendiente"
                'descargo' => $request->descargo,
            ]);

            return back()->with('success', 'Cita reservada con éxito.');
        } catch (\Exception $e) {
            // Captura cualquier error y muestra un mensaje
            return back()->with('error', 'Hubo un error al guardar la reserva: ' . $e->getMessage());
        }
    }
}
