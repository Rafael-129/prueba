<?php

namespace App\Http\Alumno;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HorariosController extends Controller
{
    public function horarios(){

        return view('Alumno.horarios');
    }
}
