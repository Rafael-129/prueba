<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Profesor;
use App\Models\EstadoConsulta;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfesorQuejasController extends Controller
{
    public function pquejas(Request $request)
    {
        $profesor = auth()->user()->profesor;
        $consultas = Consulta::where('idProfesor', $profesor->idProfesor)
        ->with('estadoConsulta')
        ->get();
        $estadoconsultas = EstadoConsulta::all();
        
        // Filtrar por estado si se selecciona
        $idEstadoConsulta = $request->input('idEstadoConsulta');  
        if ($idEstadoConsulta) {
            $consultas = Consulta::where('idProfesor', $profesor->idProfesor)
                                ->where('idEstadoConsulta', $idEstadoConsulta)
                                ->get();
        } else {
            $consultas = Consulta::where('idProfesor', $profesor->idProfesor)->get();
        }
        
        return view('Profesor.Profesorquejas', compact('consultas', 'estadoconsultas'));
    }

    public function responderConsulta(Request $request, $idConsulta)
    {
        // Obtener la consulta
        $consulta = Consulta::find($idConsulta);

        // Verificar si la consulta existe
        if (!$consulta) {
            return back()->withErrors(['error' => 'Consulta no encontrada.']);
        }
        // Actualizar la respuesta de la consulta
        $consulta->respuesta = $request->respuesta;
        $consulta->fechaRespuesta = now();
        $consulta->save();
        return back()->with('success', 'Respuesta enviada con éxito.');
    }

    public function actualizarEstado(Request $request, $idConsulta)
    {
        // Validar los datos recibidos
        $request->validate([
            'idEstadoConsulta' => 'required|exists:estadoconsulta,idEstadoConsulta',
        ]);

        // Obtener la consulta con el id proporcionado
        $consulta = Consulta::find($idConsulta);

        // Verificar si la consulta existe
        if (!$consulta) {
            return redirect()->route('profesor.consultas')->withErrors('Consulta no encontrada.');
        }

        // Actualizar el estado de la consulta
        $consulta->idEstadoConsulta = $request->idEstadoConsulta;
        $consulta->save();

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('Profesor.quejas')->with('success', 'Estado de la consulta actualizado.');
    }

}
