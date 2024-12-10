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
        
        // Si no se encuentra un alumno para el usuario autenticado, podrías redirigir o mostrar un error
        if (!$alumno) {
            return redirect()->route('alumnos.index')->with('error', 'No se encontró el alumno asociado.');
        }

        // Obtener todas las notas y cursos
        $notas = $alumno->notas;
        $curso = $alumno->curso;
        $cursos = Cursos::all();

        return view('Alumno.notas', compact('alumno', 'notas', 'curso', 'cursos'));
    }
    
    public function detallesCurso($idCurso)
    {
        // Obtener el alumno asociado al usuario autenticado
        $alumno = Alumno::with('notas')->where('idUsuario', auth()->id())->first();
        if (!$alumno) {
            return redirect()->route('alumnos.index')->with('error', 'No se encontró el alumno asociado.');
        }
        // Obtener el curso seleccionado y las notas asociadas a ese curso para el alumno
        $cursoSeleccionado = Cursos::findOrFail($idCurso);
        $notas = $alumno->notas()->where('idCursos', $idCurso)->get();
        $cursos = Cursos::all(); // Asegúrate de obtener todos los cursos si es necesario
        return view('Alumno.notas', compact('alumno', 'cursoSeleccionado', 'notas', 'cursos'));
    }
}
