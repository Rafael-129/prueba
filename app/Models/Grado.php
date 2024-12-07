<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grado'; // Nombre de la tabla si no es singular
    protected $primaryKey = 'idGrado'; // Si el nombre de la clave primaria es diferente
    public $timestamps = false; // Si la tabla no tiene columnas created_at y updated_at

    // Relación con los alumnos
    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'idGrado', 'idGrado');
    }
    
    public function profesores()
    {
        return $this->hasMany(Profesor::class, 'idGrado', 'idGrado');
    }

}