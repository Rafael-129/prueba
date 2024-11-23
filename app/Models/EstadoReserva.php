<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoReserva extends Model
{
    use HasFactory;

    protected $primaryKey = 'idEstadoReserva';
    protected $table = 'estadoreserva';

    public $timestamps = false;

    protected $fillable = [
        'estado',
    ];

    public function reservas()
    {
        return $this->hasMany(reserva::class, 'idEstadoReserva', 'idEstadoReserva');
    }
}
