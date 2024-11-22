<?php

namespace App\Http\Controllers;

use App\Models\Notas;
use App\Models\Alumno;
use App\Models\Cursos;
use Illuminate\Http\Request;

class ProfesorNotasController extends Controller
{
    public function profNotas()
    {
        // Obtener todas las notas de los alumnos
        $notas = Notas::with(['alumno', 'curso', 'profesor'])->get();
        return view('Profesor.ProfesorNotas', compact('notas'));
    }

    public function create()
    {
        // Obtener todos los alumnos y cursos
        $alumnos = Alumno::all();
        $cursos = Cursos::all();

        return view('Profesor.createNota', compact('alumnos', 'cursos'));
    }

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'materia' => 'required',
            'nota' => 'required|numeric|min:0|max:20',
            'idAlumnos' => 'required|exists:alumno,idAlumno',
            'idCursos' => 'required|exists:cursos,idCursos',
        ]);

        // Crear una nueva nota
        Notas::create([
            'materia' => $request->materia,
            'nota' => $request->nota,
            'idProfesor' => auth()->id(), // El profesor autenticado es quien crea la nota
            'idAlumnos' => $request->idAlumnos,
            'idCursos' => $request->idCursos,
        ]);

        return redirect()->route('profesor.notas.index')->with('success', 'Nota creada exitosamente');
    }

    public function edit($id)
    {
        // Obtener la nota a editar
        $nota = Notas::findOrFail($id);
        $alumnos = Alumno::all();
        $cursos = Cursos::all();

        return view('Profesor.editNota', compact('nota', 'alumnos', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'materia' => 'required',
            'nota' => 'required|numeric|min:0|max:20',
            'idAlumnos' => 'required|exists:alumno,idAlumno',
            'idCursos' => 'required|exists:cursos,idCursos',
        ]);

        // Actualizar la nota
        $nota = Notas::findOrFail($id);
        $nota->update([
            'materia' => $request->materia,
            'nota' => $request->nota,
            'idAlumnos' => $request->idAlumnos,
            'idCursos' => $request->idCursos,
        ]);

        return redirect()->route('profesor.notas.index')->with('success', 'Nota actualizada exitosamente');
    }

    public function destroy($id)
    {
        // Eliminar la nota
        $nota = Notas::findOrFail($id);
        $nota->delete();

        return redirect()->route('profesor.notas.index')->with('success', 'Nota eliminada exitosamente');
    }
}
