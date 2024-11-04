<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuejasController extends Controller
{
    public function quejas()
    {

        return view('Alumno.quejas');

    }

    public function pquejas()
    {

        return view('Profesor.Profesorquejas');

    }
}
