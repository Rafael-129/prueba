<?php
namespace App\Http\Controllers;
use App\Models\Dia;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Profesor;
use App\Models\DisponibilidadProfesor;
use App\Models\EstadoReserva; // Asegúrate de importar el modelo EstadoReserva

use Carbon\Carbon; 
class ProfesorCitasController extends Controller
{
    public function pCitas()
    {
        // Obtener el profesor autenticado basado en el usuario
        $profesor = Profesor::where('idUsuario', auth()->id())->first();
    
        if (!$profesor) {
            return back()->withErrors(['error' => 'No se encontró un profesor asociado con el usuario actual.']);
        }
    
        // Obtener las citas asociadas al profesor
        $citas = Reserva::with(['estadoReserva', 'alumno'])
            ->where('idProfesor', $profesor->idProfesor)
            ->get();
    
        // Obtener todos los estados de las reservas
        $estados = EstadoReserva::all();
    
        // Obtener la disponibilidad del profesor
        $diasNoDisponibles = DisponibilidadProfesor::where('idProfesor', $profesor->idProfesor)->get();
    
        return view('profesor.ProfesorCitas', compact('citas', 'estados', 'diasNoDisponibles'));
    }
    

    public function actualizarEstado(Request $request, $idReservas)
    {
    // Buscar la cita por ID
    $cita = Reserva::findOrFail($idReservas);

    // Verificar que el valor de idEstadoReserva no sea nulo
    $idEstadoReserva = $request->input('idEstadoReserva');
    if (is_null($idEstadoReserva)) {
        return redirect()->route('Profesor.Citas')
            ->with('error', 'El estado de la reserva no puede ser nulo.');
    }

    // Actualizar el estado
    $cita->idEstadoReserva = $idEstadoReserva;
    $cita->save();

    return redirect()->route('Profesor.Citas')->with('success', 'Estado actualizado correctamente.');
    }

    public function storeDiasNoDisponibles(Request $request)
    {
        try {
            // Verificar si el usuario está autenticado
            if (!auth()->check()) {
                return response()->json(['message' => 'Usuario no autenticado.'], 401);
            }
    
            $user = auth()->user(); // Obtener el usuario autenticado
    
            // Verificar si el usuario está asociado con un profesor
            if (!$user->profesor) {
                return response()->json(['message' => 'Profesor no asociado al usuario'], 400);
            }
    
            // Si llega aquí, es porque el usuario tiene un profesor asociado
            $idProfesor = $user->profesor->idProfesor;
    
            $fechas = $request->input('fechas'); // Recibir las fechas
    
            // Validación de las fechas
            if (empty($fechas)) {
                return response()->json(['message' => 'No se han seleccionado fechas.'], 400);
            }
    
            // Guardar las fechas no disponibles
            foreach ($fechas as $fecha) {
                DisponibilidadProfesor::create([
                    'idProfesor' => $idProfesor,
                    'fecha' => $fecha,
                ]);
            }
    
            return response()->json(['message' => 'Fechas guardadas exitosamente.'], 200);
    
        } catch (\Exception $e) {
            \Log::error('Error al guardar días no disponibles: ' . $e->getMessage());
            return response()->json(['message' => 'Error interno del servidor'], 500);
        }
    }
    
}