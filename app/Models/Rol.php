<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    // Indica que la tabla se llama 'rol'
    protected $table = 'rol';

    // Indica que la clave primaria es 'idRol'
    protected $primaryKey = 'idRol';

    // Define los campos que se pueden asignar en masa
    protected $fillable = ['idRol', 'nombre'];
}

