<?php

namespace App\Http\Public;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function propuesta()
    {
        return view('index.Propuestas_Educativas');
        
    }

    public function nosotros(){
        return view('index.Nosotros');
    }

    public function indexAnuncios(){
        return view('index.indexAnuncios');
    }

    public function contactanos(){
        return view('index.Contactanos');
    }
}
