<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $primaryKey = 'idConsultas'; 
    protected $table = 'consultas'; 
    public $timestamps = false;
    protected $fillable = [
        'nombres', 'apellidoPaterno', 'apellidoMaterno', 'descripcion', 'fechaEnvio', 'respuesta', 
        'fechaRespuesta', 'idEstadoConsulta', 'idProfesor', 'idAlumno'
    ];


    // Relación con Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idProfesor', 'idProfesor');
    }
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'idAlumno', 'idAlumno');
    }

    public function estadoConsulta()
    {
        return $this->belongsTo(EstadoConsulta::class, 'idEstadoConsulta', 'idEstadoConsulta');
    }
}