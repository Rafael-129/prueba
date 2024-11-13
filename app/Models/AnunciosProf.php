<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnunciosProf extends Model
{
    use HasFactory;

    protected $table = 'anuncios_profs'; // Verifica si coincide con el nombre de la tabla
    protected $primaryKey = 'id'; // Verifica si coincide con la llave primaria
    protected $fillable = ['image', 'fechapub', 'fechaev', 'lugar', 'detalle', 'created_at', 'updated_at'];
    protected $casts = [
        'fechapub' => 'datetime',
        'fechaev' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
