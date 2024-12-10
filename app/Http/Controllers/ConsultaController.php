<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Consulta;
use App\Models\Alumno;
use App\Models\EstadoConsulta;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class ConsultaController extends Controller
{
    public function vista(Request $request)
    {
        // Obtener el alumno autenticado (no el usuario)
        $alumno = Alumno::where('idUsuario', auth()->id())->first();
    
        // Validar que el alumno fue encontrado
        if (!$alumno) {
            return redirect()->route('login')->withErrors('No se encontró el alumno asociado al usuario.');
        }
    
        // Obtener todos los estados de consulta
        $estadoconsultas = EstadoConsulta::all();
    
        // Obtener las consultas del alumno autenticado
        $consultas = $alumno->consultas() 
            ->with('estadoConsulta') 
            ->when($request->filled('idEstadoConsulta'), function ($query) use ($request) {
                return $query->where('idEstadoConsulta', $request->idEstadoConsulta);
            })
            ->get();
    
        // Pasar los datos a la vista
        return view('Alumno.conectados', compact('consultas', 'estadoconsultas'));
    }
}
