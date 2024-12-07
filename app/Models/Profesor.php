<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    // Establecer la clave primaria personalizada
    protected $primaryKey = 'idProfesor';

    // Nombre de la tabla en la base de datos
    protected $table = 'profesor';

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'apellido', 'DNI', 'Rol', 'password'];

    // Relación uno a muchos con anuncios
    public function anuncios()
    {
        return $this->hasMany(AnunciosProf::class, 'idProfesor', 'idProfesor');
    }

    // Relación inversa: un Profesor pertenece a un Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario'); // Relación con la tabla usuarios
    }
}
