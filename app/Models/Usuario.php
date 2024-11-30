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
        'name', 'email', 'password', 'idRol',
    ];

    // Relación con el modelo 'Rol'
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol', 'idRol');
    }
}

