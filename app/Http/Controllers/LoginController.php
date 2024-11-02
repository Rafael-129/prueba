<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('Login');
    }

    public function registro(){
        return view('Profesor.Registrar');
    }

    public function registrar(Request $request)
    {
        $item = new Usuario();
        $item -> DNI = $request -> DNI;
        $item -> password = Hash::make($request->password);
        $item -> save();
        return redirect()->route('Login')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }

    public function IniSesion(Request $request)
    {
       $creadenciales = [
        'DNI' => $request->DNI,
        'password'=> $request->password,
       ];

        // Verificar si el DNI existe
        $usuario = Usuario::where('DNI', $request->DNI)->first();

        if (!$usuario) {
            // Mensaje si el DNI no existe
            return redirect()->route('Login')->withErrors(['DNI' => 'DNI incorrecto.']);
        }

        // Intentar autenticación
        if (Auth::guard('web')->attempt(['DNI' => $request->DNI, 'password' => $request->password])) {
            return redirect()->route('Alumno.anuncios');
        } else {
            // Mensaje si la contraseña es incorrecta
            return redirect()->route('Login')->withErrors(['password' => 'La contraseña es incorrecta.']);
        }
    }

}
