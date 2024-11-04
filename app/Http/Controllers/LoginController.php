<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //Funciones de Vista Login & Registro
    public function login()
    {
        return view('Login');
    }

    public function registro(){
        return view('Profesor.Registrar');
    }

    //Funcion de Registrar usuario
    public function registrar(Request $request)
    {
        $item = new Usuario();
        $item -> DNI = $request -> DNI;
        $item -> password = $request -> password;
        $item -> save();
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
    
        // Validar la contraseña directamente sin incriptación
        if ($usuario->password === $request->password) {
            // Si la contraseña es correcta, iniciar sesión
            Auth::login($usuario);
            return redirect()->route('Alumno.anuncios');
            
        } else {
            // Mensaje si la contraseña es incorrecta
            return redirect()->route('Login')->withErrors(['password' => 'La contraseña es incorrecta.']);
        }
    }

}
