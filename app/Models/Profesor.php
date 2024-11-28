<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    // Establecer la clave primaria personalizada
    protected $primaryKey = 'idProfesor';
    
    protected $table = 'profesor';  // Nombre de la tabla

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'apellido', 'DNI', 'Rol', 'password'];

    // Relación uno a muchos con anuncios
    public function anuncios()
    {
        return $this->hasMany(AnunciosProf::class, 'idProfesor', 'idProfesor');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');  // Asegúrate de que el nombre de la relación es correcto
    }
}
