<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'reserva';

    public $timestamps = false;  // Si no usas created_at y updated_at

    // Otros atributos del modelo
    protected $fillable = [
        'fechaReserva',
        'horaReserva',
        'idProfesor',
        'idAlumno',
        'idEstadoReserva',
        'descargo',
    ];

    // Relación con Profesor (usando idProfesor)
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idProfesor', 'idProfesor');
    }

    // Relación con Alumno (usando idAlumno)
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'idAlumno', 'idAlumno');
    }

    // Relación con EstadoReserva (usando idEstadoReserva)
    public function estadoReserva()
    {
        return $this->belongsTo(EstadoReserva::class, 'idEstadoReserva', 'idEstadoReserva');
    }
}
