<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla para que coincida con la tabla de la base de datos
    protected $table = 'reserva';
    
    public $timestamps = false; 

    protected $fillable = [
        'fechaReserva', 'horaReserva', 'idProfesor', 'idAlumno', 'idEstadoReserva', 'descargo',
    ];

    // Relación con el Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'idAlumno');
    }

    // Relación con el Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idProfesor');
    }

    // Relación con el EstadoReserva
    public function estadoReserva()
    {
        return $this->belongsTo(EstadoReserva::class, 'idEstadoReserva');
    }
}
