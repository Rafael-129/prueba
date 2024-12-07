<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\rol;
use App\Models\Profesor; 
use App\Models\Alumno; 

class LoginController extends Controller
{
    //Funciones de Vista Login & Registro
    public function login()
    {
        return view('Login');
    }

    public function registro(){
        $roles = rol::all(); // Obtener todos los roles
        return view('Profesor.Registrar', compact('roles'));
    }

    public function registrar(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'DNI' => 'required|string|unique:usuario,DNI|max:8',
            'rol' => 'required|in:1,2',
            'password' => 'required|string', 
        ]);
    
        // Crear el usuario 
        $usuario = new Usuario();
        $usuario->DNI = $request->DNI;
        $usuario->password = $request->password; 
        $usuario->idrol = $request->rol;
        $usuario->save();
    
        // Obtener el ID del usuario recién creado
        $idUsuario = $usuario->idUsuario;
    
        // Ahora registrar el profesor o alumno
        if ($request->rol == '1') {
            // Registrar como Profesor (solo los campos básicos)
            $item = new Profesor();
            $item->nombre = $request->nombre;
            $item->apellido = $request->apellido;
            $item->idUsuario = $idUsuario;  
            $item->save();
        } else {
            // Registrar como Alumno (solo los campos básicos)
            $item = new Alumno();
            $item->nombre = $request->nombre;
            $item->apellido = $request->apellido;
            $item->idUsuario = $idUsuario;  // Relación con la tabla usuario

            // Agregar los campos 'grado' y 'curso' más tarde cuando estén disponibles
            $item->fecha = now(); 
            $item->save();
        }
    
        return redirect()->route('Login')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }
    


    // Funcion de inicio de sesion
    public function IniSesion(Request $request)
    {
        // Verificar si el DNI existe
        $usuario = Usuario::where('DNI', $request->DNI)->first();

        if (!$usuario) {
            // Mensaje si el DNI no existe
            return redirect()->route('Login')->withErrors(['DNI' => 'DNI incorrecto.']);
        }

        // Validar la contraseña 
        if ($usuario->password === $request->password) {
            // Si la contraseña es correcta, iniciar sesión
            Auth::login($usuario);

            // Redirigir según el rol
            if ($usuario->idRol == 1) {
                return redirect()->route('anuncios_profs.index');
            } elseif ($usuario->idRol == 2) {
                return redirect()->route('Alumno.anuncios');
            }

        } else {
            // Mensaje si la contraseña es incorrecta
            return redirect()->route('Login')->withErrors(['password' => 'La contraseña es incorrecta.']);
        }
    }

}
