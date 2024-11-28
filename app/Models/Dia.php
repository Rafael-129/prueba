<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla
    protected $table = 'dia';

    // Definir la clave primaria
    protected $primaryKey = 'idDia';

    // Indicar que no se manejan timestamps automáticamente
    public $timestamps = false;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'MroDia', // Asegúrate de usar el nuevo nombre de la columna
    ];

    // Relación con el modelo DisponibilidadProfesor
    public function disponibilidadProfesores()
    {
        return $this->hasMany(DisponibilidadProfesor::class, 'idDia');
    }
}
