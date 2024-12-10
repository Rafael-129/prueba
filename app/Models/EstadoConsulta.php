<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoConsulta extends Model
{

    protected $table = 'estadoconsulta'; // Nombre de la tabla
    protected $primaryKey = 'idEstadoConsulta'; // Clave primaria
    public $timestamps = false; // Si la tabla no tiene columnas created_at y updated_at

    protected $fillable = [
        'idEstadoConsulta', 'estado', 
    ];

    // Relación con las consultas
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'idEstadoConsulta', 'idEstadoConsulta');
    }

    
}
