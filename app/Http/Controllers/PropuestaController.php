<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropuestaController extends Controller
{
    public function propuesta()
    {
        return view('index.Propuestas_Educativas');
    }
}
