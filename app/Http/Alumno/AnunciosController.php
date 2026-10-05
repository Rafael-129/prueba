<?php

namespace App\Http\Alumno;

use App\Http\Controllers\Controller;
use App\Http\Profesor\AnunciosProfController;

use App\Models\AnunciosProf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnunciosController extends Controller
{
    public function anuncios(Request $request)
    {
        // Usamos AnunciosProfController para obtener los anuncios
        $controller = new AnunciosProfController();
        return $controller->index($request);  // Esto manejará la lógica de anuncios
    }
}
