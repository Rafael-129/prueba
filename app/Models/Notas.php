<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    protected $primaryKey = 'idNotas';

    // Definir el nombre de la tabla si no es plural
    protected $table = 'notas';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'materia', 
        'nota', 
        'fechaRegistro', 
        'idProfesor', 
        'idAlumnos',
        'idCursos'
    ];

    // Relación con Alumno
    public function alumno()
    {
        // La relación indica que cada nota pertenece a un alumno
        return $this->belongsTo(Alumno::class, 'idAlumnos', 'idAlumno');
    }

    // Relación con Profesor
    public function profesor()
    {
        // La relación indica que cada nota pertenece a un profesor
        return $this->belongsTo(Profesor::class, 'idProfesor');
    }

    // Relación con Cursos
    public function curso()
    {
        // La relación indica que cada nota pertenece a un curso
        return $this->belongsTo(Cursos::class, 'idCursos');
    }
}
