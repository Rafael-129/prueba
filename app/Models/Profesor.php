<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    // Establecer la clave primaria personalizada
    protected $primaryKey = 'idProfesor';
    
    protected $table = 'profesor';  // Nombre de la tabla

    // Definir los campos q
    protected $fillable = ['nombre', 'apellido', 'DNI', 'Rol', 'password'];
}
