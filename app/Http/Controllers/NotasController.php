<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Notas;
use App\Models\Cursos;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function notas()
    {
        // Obtener el alumno asociado al usuario autenticado
        $alumno = Alumno::with(['notas', 'curso'])->where('idUsuario', auth()->id())->first();

        if (!$alumno) {
            return redirect()->route('alumnos.index')->with('error', 'No se encontró el alumno asociado.');
        }

        // Obtener todos los cursos asignados al alumno a través de las notas
        $notas = $alumno->notas; 
        $curso = $alumno->curso; 
        $cursos = Cursos::all(); 

        return view('Alumno.notas', compact('alumno', 'notas', 'curso', 'cursos'));
    }
}
