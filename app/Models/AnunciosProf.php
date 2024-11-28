<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnunciosProf extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['image', 'fechapub', 'fechaev', 'lugar', 'detalle'];

    // Si no necesitas la relación con la tabla profesor, elimina este método:
    // public function profesor()
    // {
    //     return $this->belongsTo(Profesor::class, 'idProfesor', 'idProfesor');
    // }
}
