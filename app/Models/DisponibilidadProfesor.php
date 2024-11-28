<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisponibilidadProfesor extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla
    protected $table = 'disponibilidadprof';

    // Definir la clave primaria
    protected $primaryKey = 'idDisponibilidadProf';

    // Indicar que no se manejan timestamps automáticamente
    public $timestamps = false;

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'idProfesor', 'idDia',
    ];

    // Relación con el Profesor
    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'idProfesor');
    }

    // Relación con el Día
    public function dia()
    {
        return $this->belongsTo(Dia::class, 'idDia');
    }
}
