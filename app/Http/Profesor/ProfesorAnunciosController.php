<?php

namespace App\Http\Profesor;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfesorAnunciosController extends Controller
{
    public function panuncios(){

        return view('Profesor.ProfesorAnuncios');
    }
}
