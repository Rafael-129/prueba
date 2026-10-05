<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoSeccion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grado')->insert([
            ['idGrado' => 1, 'Grado' => '1', 'Seccion' => 'A'],
            ['idGrado' => 2, 'Grado' => '1', 'Seccion' => 'B'],
            ['idGrado' => 3, 'Grado' => '1', 'Seccion' => 'C'],
            ['idGrado' => 4, 'Grado' => '2', 'Seccion' => 'A'],
            ['idGrado' => 5, 'Grado' => '2', 'Seccion' => 'B'],
            ['idGrado' => 6, 'Grado' => '2', 'Seccion' => 'C'],
            ['idGrado' => 7, 'Grado' => '3', 'Seccion' => 'A'],
            ['idGrado' => 8, 'Grado' => '3', 'Seccion' => 'B'],
            ['idGrado' => 9, 'Grado' => '3', 'Seccion' => 'C'],
            ['idGrado' => 10, 'Grado' => '4', 'Seccion' => 'A'],
            ['idGrado' => 11, 'Grado' => '4', 'Seccion' => 'B'],
            ['idGrado' => 12, 'Grado' => '4', 'Seccion' => 'C'],
            ['idGrado' => 13, 'Grado' => '5', 'Seccion' => 'A'],
            ['idGrado' => 14, 'Grado' => '5', 'Seccion' => 'B'],
            ['idGrado' => 15, 'Grado' => '5', 'Seccion' => 'C'],
            ['idGrado' => 16, 'Grado' => '6', 'Seccion' => 'A'],
            ['idGrado' => 17, 'Grado' => '6', 'Seccion' => 'B'],
            ['idGrado' => 18, 'Grado' => '6', 'Seccion' => 'C'],
        ]);
    }
}
