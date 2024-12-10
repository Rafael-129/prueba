<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Consulta;
use App\Models\Alumno;
use Illuminate\Http\Request;


class QuejasController extends Controller
{
    public function quejas()
    {
        // Obtener el idAlumno desde la sesión
        $idAlumno = auth()->user()->idAlumno;
        $profesores = Profesor::all();
        
        return view('Alumno.quejas', compact('profesores', 'idAlumno'));
    }
    

    public function guardarConsulta(Request $request)
    {
        
        // Validar la información recibida
        /*
        $request->validate([
            'nombres' => 'required|string|max:10',
            'apellidoPaterno' => 'required|string|max:255',
            'apellidoMaterno' => 'required|string|max:255',
            'fechaReclamo' => 'required|date',
            'idProfesor' => 'required|exists:profesor,idProfesor',
            'descripcion' => 'required|string|max:500',
            'idAlumno' => 'required|exists:alumno,idAlumno',
        ]);
        */

        // Buscar al alumno asociado con el usuario autenticado
        $alumno = Alumno::where('idUsuario', auth()->id())->first();

        // Verificar si el alumno existe
        if (!$alumno) {
            return back()->withErrors(['error' => 'No se encontró un alumno asociado con el usuario actual.']);
        }

        // Crear una nueva consulta en la base de datos
        Consulta::create([
            'nombres' => $request->nombres,                
            'apellidoPaterno' => $request->apellidoPaterno,
            'apellidoMaterno' => $request->apellidoMaterno,
            'descripcion' => $request->descripcion,
            'fechaEnvio' => $request->fechaReclamo,
            'respuesta' => '',
            'idEstadoConsulta' => 1,
            'idProfesor' => $request->idProfesor,
            'idAlumno' => $alumno->idAlumno,
            'timestamps' => now(),
        ]);

        return back()->with('success', 'Consulta o Queja registrada con éxito.');
    }

}


