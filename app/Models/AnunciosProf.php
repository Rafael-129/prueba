<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnunciosProf extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['idProfesor', 'image', 'fechapub', 'fechaev', 'lugar', 'detalle'];

    // Relación inversa con el modelo Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idProfesor', 'idProfesor');
    }
}
