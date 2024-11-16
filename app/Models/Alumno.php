<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';  // Nombre de la tabla

    // Definir los campos 
    protected $fillable = ['nombre', 'apellido'];
}
