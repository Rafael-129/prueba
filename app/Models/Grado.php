<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $table = 'grado'; 
    protected $primaryKey = 'idGrado'; 
    public $timestamps = false; 
    protected $fillable = ['idGrado', 'Grado', 'Seccion'];

    // Relación con los alumnos
    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'idGrado', 'idGrado');
    }
    
    public function profesores()
    {
        return $this->hasMany(Profesor::class, 'idGrado', 'idGrado');
    }

}