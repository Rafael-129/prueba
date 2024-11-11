<?php

namespace App\Http\Controllers;

use App\Models\AnunciosProf;
use Illuminate\Http\Request;

class AnunciosProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anuncios_profs = AnunciosProf::all();
        return view('Anuncios.index',compact('anuncios'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AnunciosProf $anunciosProf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnunciosProf $anunciosProf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnunciosProf $anunciosProf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnunciosProf $anunciosProf)
    {
        //
    }
}
