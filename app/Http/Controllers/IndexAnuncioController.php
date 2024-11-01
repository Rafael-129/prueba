<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexAnuncioController extends Controller
{
    public function indexAnuncios(){
        return view('index.indexAnuncios');
    }
}
