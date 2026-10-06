<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Define la tabla 'usuario' en lugar de 'users'
    protected $table = 'usuario';

    // Define la clave primaria si es diferente
    protected $primaryKey = 'idUsuario'; // Si el ID de la tabla es 'idUsuario'

    protected $fillable = [
        'DNI', 'password', 'idRol',
    ];

    // Relación con el modelo 'Rol'
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol', 'idRol');
    }

    public function profesor()
    {
        return $this->hasOne(Profesor::class, 'idUsuario', 'idUsuario');
    }

    public function alumno()
    {
        return $this->hasOne(Alumno::class, 'idUsuario', 'idUsuario');
    }
}

