<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
    
class Cursos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = [
            ['nombreCurso' => 'Matemáticas', 'descripcion' => 'Curso de matemáticas básicas'],
            ['nombreCurso' => 'Comunicacion', 'descripcion' => 'Curso de lengua y literatura'],
            ['nombreCurso' => 'Ciencias', 'descripcion' => 'Curso de ciencias naturales'],
            ['nombreCurso' => 'Educacion Fisica', 'descripcion' => 'Curso de educacion fisica'],
            ['nombreCurso' => 'Ingles', 'descripcion' => 'Curso de ingles'],
        ];

        $grados = DB::table('grado')->pluck('idGrado');

        if ($grados->isEmpty()) {
            return;
        }

        $primerGrado = $grados->first();

        foreach ($cursos as $curso) {
            DB::table('cursos')
                ->whereNull('idGrado')
                ->where('nombreCurso', $curso['nombreCurso'])
                ->update(['idGrado' => $primerGrado]);
        }

        DB::statement("SELECT setval(pg_get_serial_sequence('cursos', 'idCursos'), COALESCE((SELECT MAX(\"idCursos\") FROM cursos), 0) + 1, false)");

        foreach ($grados as $idGrado) {
            foreach ($cursos as $curso) {
                DB::table('cursos')->updateOrInsert(
                    [
                        'idGrado' => $idGrado,
                        'nombreCurso' => $curso['nombreCurso'],
                    ],
                    ['descripcion' => $curso['descripcion']]
                );
            }
        }
    }
}
