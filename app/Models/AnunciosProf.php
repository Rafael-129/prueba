<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnunciosProf extends Model
{
    use HasFactory;

    protected $table = 'anuncios'; // Cambiar si el nombre de la tabla no es 'anuncios_profs'
    protected $primaryKey = 'id_anuncio'; // Cambiar si la llave primaria no es 'id'
    protected $fillable = ['image', 'fechapub', 'fechaev', 'lugar', 'detalle'];
    protected $casts = [
        'fechapub' => 'datetime',
        'fechaev' => 'datetime',
    ];
    protected $attributes = [
        'lugar' => 'No especificado',
        'detalle' => 'Sin detalle',
    ];

    public function getImageAttribute($value)
    {
        return asset('storage/' . $value); // Para imágenes
    }
}

