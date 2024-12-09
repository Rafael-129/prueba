<?php

namespace App\Http\Controllers;

use App\Models\AnunciosProf;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AnunciosProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Inicializar la consulta base
        $query = AnunciosProf::query();

        // Aplicar filtro por lugar, si se ha ingresado
        if ($request->filled('lugar')) {
            $query->where('lugar', 'like', '%' . $request->input('lugar') . '%');
        }

        // Aplicar filtro por fecha del evento, si se ha ingresado
        if ($request->filled('fechaev')) {
            $query->where('fechaev', $request->input('fechaev'));
        }

        // Obtener los resultados filtrados con paginación (7 por página)
        $anuncios_profs = $query->paginate(7);

        // Retornar la vista con los resultados
        if (auth()->user()->rol->idRol == 1) {
            return view('Anuncios.index', compact('anuncios_profs'));
        } else {
            return view('Anuncios.index', compact('anuncios_profs'));
        }
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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'fechapub' => 'required|date',
        'fechaev' => 'required|date|after_or_equal:fechapub',
        'lugar' => 'required|string|max:255',
        'detalle' => 'required|string|max:500',
    ]);

    // Subir la imagen si está presente
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('anuncios', 'public');
    } else {
        $imagePath = null;
    }

    // Obtener el idProfesor del usuario autenticado
    $profesor = Auth::user()->profesor;  // Relación con el profesor
    $idProfesor = $profesor ? $profesor->idProfesor : null;  // Obtener el id del profesor

    // Crear el nuevo anuncio
    AnunciosProf::create([
        'image' => $imagePath,
        'fechapub' => $validatedData['fechapub'],
        'fechaev' => $validatedData['fechaev'],
        'lugar' => $validatedData['lugar'],
        'detalle' => $validatedData['detalle'],
        'idProfesor' => $idProfesor,  // Asociar el idProfesor automáticamente
    ]);

    return redirect()->route('anuncios_profs.index')->with('success', 'Anuncio creado con éxito');
}





    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fechapub' => 'required|date',
            'fechaev' => 'required|date|after_or_equal:fechapub',
            'lugar' => 'required|string|max:255',
            'detalle' => 'required|string|max:500',
        ]);

        $anuncio = AnunciosProf::findOrFail($id);
        $anuncio->update($validated);

        // Verificar si se subió una nueva imagen
        if ($request->hasFile('image')) {
            // Crear la carpeta 'img' si no existe
            if (!Storage::exists('public/img')) {
                Storage::makeDirectory('public/img'); // Crea la carpeta automáticamente
            }

            // Eliminar la imagen anterior si existe
            if ($anuncio->image) {
                Storage::delete('public/' . $anuncio->image);
            }

            // Subir la nueva imagen
            $nombre = $anuncio->id . '.' . $request->file('image')->getClientOriginalExtension();
            $ruta = $request->file('image')->storeAs('public/img', $nombre); // Guarda en storage/app/public/img
            $anuncio->image = 'storage/img/' . $nombre; // Ruta accesible desde public/storage
            $anuncio->save(); // Actualiza el anuncio con la ruta de la imagen
        }

        return redirect()->route('anuncios_profs.index')->with('success', 'Anuncio actualizado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show($anuncios_prof)
    {
        $anuncio = AnunciosProf::findOrFail($anuncios_prof);
        return view('Anuncios.show', compact('anuncio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anuncio = AnunciosProf::findOrFail($id);
        return view('Anuncios.edit', compact('anuncio'));
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anuncio = AnunciosProf::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($anuncio->image) {
            Storage::delete('public/' . $anuncio->image);
        }

        if (!$anuncio) {
            return redirect()->route('anuncios_profs.index')->with('error', 'El anuncio no existe.');
        }


        $anuncio->delete();
        return redirect()->route('anuncios_profs.index')->with('success', 'Anuncio eliminado correctamente.');
    }
}