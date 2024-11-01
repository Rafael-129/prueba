<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesorAnunciosController extends Controller
{
    public function panuncios(){

        return view('Profesor.ProfesorAnuncios');
    }
}
