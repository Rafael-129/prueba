<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    // Establecer la clave primaria personalizada
    protected $primaryKey = 'idAlumno';

    // Definir el nombre de la tabla si no sigue la convención de pluralización
    protected $table = 'alumno';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'idGrado',
        'curso',
        'fecha',
        'nombre',
        'apellido',
        'idUsuario'
    ];

    
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    // Relación con Notas
    public function notas()
    {
        // Un alumno puede tener muchas notas
        return $this->hasMany(Notas::class, 'idAlumnos', 'idAlumno');
    }

    // Relación con EstadoReserva
    public function estadoReserva()
    {
        return $this->belongsTo(EstadoReserva::class, 'idEstadoReserva', 'idEstadoReserva');
    }

    public function grado()
    {
        // Corregimos la relación con el campo `idGrado`
        return $this->belongsTo(Grado::class, 'idGrado', 'idGrado');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'idAlumno', 'idAlumno');
    }
}
