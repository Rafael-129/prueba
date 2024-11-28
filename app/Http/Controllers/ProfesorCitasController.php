<?php
namespace App\Http\Controllers;
use App\Models\Dia;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Profesor;
use App\Models\DisponibilidadProfesor;

use App\Models\EstadoReserva; // Asegúrate de importar el modelo EstadoReserva

class ProfesorCitasController extends Controller
{
    public function pCitas()
    {
        $profesorId = auth()->id(); // Cambiar según tu lógica de autenticación

        // Obtener las citas del profesor con relaciones
        $citas = Reserva::with(['estadoReserva', 'alumno'])
            ->where('idProfesor', $profesorId)
            ->get();

        // Obtener todos los estados de las reservas
        $estados = EstadoReserva::all();

        // Pasar tanto las citas como los estados a la vista
        return view('profesor.ProfesorCitas', compact('citas', 'estados'));
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

    public function guardarDisponibilidad(Request $request)
    {
        // Validar los días seleccionados
        $request->validate([
            'diasNoDisponibles' => 'required|array|min:1',
            'diasNoDisponibles.*' => 'integer|min:1|max:31',
        ]);
    
        // Obtener el ID del profesor autenticado
        $profesorId = auth()->id();
    
        // Verificar que el profesor exista
        $profesor = Profesor::find($profesorId);
        if (!$profesor) {
            return back()->with('error', 'El profesor no existe.');
        }
    
        // Guardar los días seleccionados
        foreach ($request->diasNoDisponibles as $dia) {
            // Verificar si el día ya existe en la tabla `dia`
            $diaExistente = Dia::firstOrCreate(['MroDia' => $dia]);
    
            // Crear o actualizar la disponibilidad del profesor
            DisponibilidadProfesor::updateOrCreate(
                ['idProfesor' => $profesorId, 'idDia' => $diaExistente->idDia],
                ['idProfesor' => $profesorId, 'idDia' => $diaExistente->idDia]
            );
        }
    
        return back()->with('success', 'Días no disponibles guardados correctamente.');
    }
    
}