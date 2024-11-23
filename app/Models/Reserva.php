<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reserva extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'reserva';
    // Indicar la clave primaria personalizada
    protected $primaryKey = 'idReservas';  
    
    public $timestamps = false; 

    // Otros atributos del modelo
    protected $fillable = [
        'fechaReserva',
        'horaReserva',
        'idProfesor',
        'idAlumno',
        'idEstadoReserva',
        'descargo',
    ];


    // Relación con el modelo EstadoReserva
    public function estadoReserva()
    {
        return $this->belongsTo(EstadoReserva::class, 'idEstadoReserva', 'idEstadoReserva');
    }

    // Relación con el modelo Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'idAlumno', 'idAlumno');
    }
}