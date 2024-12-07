<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnunciosProf extends Model
{
    // Definir la relación con el modelo Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idProfesor');  // 'idProfesor' es la clave foránea
    }

    protected $fillable = [
        'image', 'fechaev', 'fechapub', 'lugar', 'detalle', 'idProfesor'
    ];
    
}


