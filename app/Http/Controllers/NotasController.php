<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function notas(){

        return view('Alumno.notas');
        
    }
}
