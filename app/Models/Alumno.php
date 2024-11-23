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
        'grado',
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

    // Relación con Cursos
    public function curso()
    {
        // Un alumno está relacionado con un curso por nombre
        return $this->belongsTo(Cursos::class, 'curso', 'nombreCurso');
    }

    // Relación con EstadoReserva
    public function estadoReserva()
    {
        return $this->belongsTo(EstadoReserva::class, 'idEstadoReserva', 'idEstadoReserva');
    }
}
