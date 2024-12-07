<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisponibilidadProfesor extends Model
{
    use HasFactory;

    // Definir la tabla en la base de datos
    protected $table = 'disponibilidadprof';  // Nombre de la tabla en la base de datos

    // Definir la clave primaria
    protected $primaryKey = 'idDisponibilidadProf';  // Si la clave primaria no es "id", especificar el nombre de la columna

    // Deshabilitar los timestamps automáticos
    public $timestamps = false;  // Si no estás usando timestamps, puedes dejarlo como false

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'idProfesor', 'fecha',
    ];

    // Relación con el modelo Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idProfesor');  // Relación con el modelo Profesor
    }
}

