<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactanosController extends Controller
{
    public function contactanos(){
        return view('index.Contactanos');
    }
}
