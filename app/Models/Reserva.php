<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 'reserva';

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
}
