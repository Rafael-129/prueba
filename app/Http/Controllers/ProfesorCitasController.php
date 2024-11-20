<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesorCitasController extends Controller
{
    public function pCitas(){

        return view('Profesor.profesorCitas');
        
    }
}
