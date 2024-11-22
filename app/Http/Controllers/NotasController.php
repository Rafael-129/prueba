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
        $alumno = Alumno::with(['notas', 'curso'])->where('idUsuario', auth()->id())->first(); // Usamos auth()->id() para obtener el id del usuario autenticado
        
        // Si no se encuentra un alumno para el usuario autenticado, podrías redirigir o mostrar un error
        if (!$alumno) {
            return redirect()->route('alumnos.index')->with('error', 'No se encontró el alumno asociado.');
        }

        $notas = $alumno->notas; // Notas del alumno
        $curso = $alumno->curso; // Curso del alumno

        return view('Alumno.notas', compact('alumno', 'notas', 'curso'));
    }

}
