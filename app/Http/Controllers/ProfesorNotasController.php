<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Usuario;
use App\Models\Notas;
use App\Models\Alumno;
use App\Models\Cursos;
use Illuminate\Http\Request;

class ProfesorNotasController extends Controller
{

    // Método para mostrar las notas de los alumnos del mismo grado del profesor
    public function profNotas(Request $request)
{
    // Obtener el usuario autenticado
    $usuario = auth()->user();

    // Verificar si el usuario tiene el rol de 'Profesor' (idRol = 1)
    if ($usuario->idRol !== 1) {
        // Si el usuario no tiene rol de profesor, redirigir a otro lugar o mostrar mensaje de error
        return redirect()->route('home')->with('error', 'Acceso no autorizado. Solo los profesores pueden ver esta página.');
    }

    // Obtener el profesor asociado al usuario
    $profesor = $usuario->profesor;
    if (!$profesor) {
        return redirect()->route('Profesor.Citas')->with('error', 'No se encontró un profesor asociado a tu cuenta.');
    }

    // Obtener el grado del profesor
    $gradoId = $profesor->grado ? $profesor->grado->idGrado : null;

    if ($gradoId === null) {
        return redirect()->route('Profesor.Citas')->with('error', 'El profesor no tiene un grado asignado.');
    }

    // Obtener los alumnos del mismo grado que el profesor
    $alumnos = Alumno::where('idGrado', $gradoId)->get();

    // Filtrar las notas por alumno si hay un filtro seleccionado
    $alumnoId = $request->get('alumno_id'); 
    if ($alumnoId) {
        $notas = Notas::with(['alumno', 'curso', 'profesor'])
            ->where('idAlumnos', $alumnoId)
            ->get();
    } else {
        // Si no hay filtro, obtener las notas de los alumnos del grado del profesor
        $notas = Notas::with(['alumno', 'curso', 'profesor'])
            ->whereHas('alumno', function ($query) use ($gradoId) {
                $query->where('idGrado', $gradoId);
            })->get();
    }

    return view('Profesor.ProfesorNotas', compact('notas', 'alumnos'));
}

    

    // Método para crear una nueva nota
    public function create()
    {
        // Obtener todos los alumnos y cursos
        $alumnos = Alumno::all();
        $cursos = Cursos::all();

        // Retornar la vista para agregar la nota
        return view('Profesor.createNota', compact('alumnos', 'cursos'));
    }

    // Método para listar todas las notas de los alumnos
    public function index(Request $request)
    {
        // Obtener el profesor autenticado
        $profesor = auth()->user()->profesor;

        // Verificar que el profesor exista
        if (!$profesor) {
            return redirect()->back()->withErrors('No se encontró un profesor asociado.');
        }

        // Obtener el grado del profesor
        $gradoId = $profesor->idGrado;

        // Obtener los alumnos del mismo grado que el profesor
        $alumnos = Alumno::where('idGrado', $gradoId)->get();

        // Filtrar las notas por alumno si se aplica un filtro
        $alumnoId = $request->get('alumno_id');
        $notas = Notas::with(['alumno', 'curso'])
            ->when($alumnoId, function ($query) use ($alumnoId) {
                $query->where('idAlumnos', $alumnoId);
            }, function ($query) use ($gradoId) {
                $query->whereHas('alumno', function ($q) use ($gradoId) {
                    $q->where('idGrado', $gradoId);
                });
            })->get();

        // Retornar la vista con las notas y los alumnos filtrados
        return view('profesor.notas.index', compact('notas', 'alumnos'));
    }

    // Método para almacenar una nueva nota
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

        // Redirigir a la lista de notas con un mensaje de éxito
        return redirect()->route('profesor.notas.index')->with('success', 'Nota creada exitosamente');
    }

    // Método para editar una nota existente
    public function edit($id)
    {
        // Obtener la nota a editar
        $nota = Notas::findOrFail($id);

        // Obtener todos los alumnos y cursos para el formulario de edición
        $alumnos = Alumno::all();
        $cursos = Cursos::all();

        // Retornar la vista de edición con la nota, alumnos y cursos
        return view('Profesor.editNota', compact('nota', 'alumnos', 'cursos'));
    }

    // Método para actualizar una nota
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'materia' => 'required',
            'nota' => 'required|numeric|min:0|max:20',
            'idAlumnos' => 'required|exists:alumno,idAlumno',
            'idCursos' => 'required|exists:cursos,idCursos',
        ]);

        // Obtener la nota a actualizar
        $nota = Notas::findOrFail($id);

        // Actualizar la nota
        $nota->update([
            'materia' => $request->materia,
            'nota' => $request->nota,
            'idAlumnos' => $request->idAlumnos,
            'idCursos' => $request->idCursos,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('profesor.notas.index')->with('success', 'Nota actualizada exitosamente');
    }

    // Método para eliminar una nota
    public function destroy($id)
    {
        // Obtener la nota a eliminar
        $nota = Notas::findOrFail($id);

        // Eliminar la nota
        $nota->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('profesor.notas.index')->with('success', 'Nota eliminada exitosamente');
    }
}
