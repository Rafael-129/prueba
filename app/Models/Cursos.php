<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCursos';
    
    protected $table = 'cursos';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'nombreCurso',
        'descripcion'
    ];

    // Relación con Notas
    public function notas()
    {
        // Un curso puede tener muchas notas
        return $this->hasMany(Notas::class, 'idCursos');
    }


}
