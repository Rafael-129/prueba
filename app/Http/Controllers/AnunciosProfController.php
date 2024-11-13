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
        return view('Anuncios.index',compact('anuncios_profs'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
    $validatedData = $request->validate([
        'image' => 'required',
        'fechapub' => 'required',
        'fechaev' => 'required',
        'lugar' => 'required',
        'detalle' => 'required',
        // Añade otras validaciones según los campos de tu formulario
    ]);

    // Crear un nuevo registro
    AnunciosProf::create($validatedData);

    // Redirigir después de guardar
    return redirect()->route('Anuncios.index')->with('success', 'Anuncio creado con éxito.');
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
        return view('Anuncios.edit', compact('anuncios_profs'));
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
        $anunciosProf->delete(); // Elimina el registro del modelo
        return redirect()->route('Anuncios.index')->with('success', 'Anuncio eliminado con éxito.');
    }
}
