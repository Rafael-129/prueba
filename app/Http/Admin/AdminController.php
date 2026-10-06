<?php

namespace App\Http\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Grado;
use App\Models\Profesor;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard', [
            'usuarios' => Usuario::count(),
            'alumnos' => Alumno::count(),
            'profesores' => Profesor::count(),
            'grados' => Grado::count(),
        ]);
    }

    public function usuarios()
    {
        $usuarios = Usuario::with(['rol', 'alumno.grado', 'profesor.grado'])
            ->orderBy('idUsuario')
            ->get();

        return view('Admin.usuarios.index', compact('usuarios'));
    }

    public function editarGrado(Usuario $usuario)
    {
        abort_if(!$usuario->alumno && !$usuario->profesor, 404);

        $grados = Grado::orderBy('Grado')->orderBy('Seccion')->get();
        $idGradoActual = $usuario->alumno?->idGrado ?? $usuario->profesor?->idGrado;

        return view('Admin.usuarios.grado', compact('usuario', 'grados', 'idGradoActual'));
    }

    public function actualizarGrado(Request $request, Usuario $usuario)
    {
        $datos = $request->validate([
            'idGrado' => ['required', 'exists:grado,idGrado'],
        ]);

        if ($usuario->alumno) {
            $usuario->alumno->update(['idGrado' => $datos['idGrado']]);
        } elseif ($usuario->profesor) {
            $usuario->profesor->update(['idGrado' => $datos['idGrado']]);
        } else {
            abort(404);
        }

        return redirect()->route('admin.usuarios.index')
            ->with('success', 'Grado y sección actualizados correctamente.');
    }

    public function crearUsuario()
    {
        $roles = Rol::whereIn('idRol', [1, 2])->orderBy('idRol')->get();
        $grados = Grado::orderBy('Grado')->orderBy('Seccion')->get();

        return view('Admin.usuarios.create', compact('roles', 'grados'));
    }

    public function guardarUsuario(Request $request)
    {
        $datos = $request->validate([
            'DNI' => ['required', 'string', 'max:8', 'unique:usuario,DNI'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol' => ['required', 'integer', 'in:1,2'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'idGrado' => ['required', 'exists:grado,idGrado'],
            'departamento' => ['nullable', 'string', 'max:255'],
            'especialidad' => ['nullable', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($datos) {
            $usuario = new Usuario();
            $usuario->DNI = $datos['DNI'];
            $usuario->password = Hash::make($datos['password']);
            $usuario->idRol = $datos['rol'];
            $usuario->save();

            if ((int) $datos['rol'] === 1) {
                Profesor::create([
                    'nombre' => $datos['nombre'],
                    'apellido' => $datos['apellido'],
                    'idUsuario' => $usuario->idUsuario,
                    'idGrado' => $datos['idGrado'],
                    'departamento' => $datos['departamento'] ?? null,
                    'especialidad' => $datos['especialidad'] ?? null,
                ]);
            } else {
                Alumno::create([
                    'nombre' => $datos['nombre'],
                    'apellido' => $datos['apellido'],
                    'idUsuario' => $usuario->idUsuario,
                    'idGrado' => $datos['idGrado'],
                    'fecha' => now(),
                ]);
            }
        });

        return redirect()->route('admin.usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }
}
