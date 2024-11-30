<?php

namespace App\Http\Controllers;

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
