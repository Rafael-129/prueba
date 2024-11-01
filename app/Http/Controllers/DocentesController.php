<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocentesController extends Controller
{
    public function docentes(){

        return view('Alumno.docentes');
        
    }
}
