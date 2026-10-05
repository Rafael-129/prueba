<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosRol extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     DB::table('rol')->insert([
            ['idRol' => 1, 'nombre' => 'Profesor'], // Profesor
            ['idRol' => 2, 'nombre' => 'Alumno'], // Alumno
        ]);
    }
}
