<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearDisponibilidadProf extends Command
{
    protected $signature = 'disponibilidad:clear';
    protected $description = 'Eliminar todas las disponibilidades al inicio de cada mes';

    public function handle()
    {
        DB::table('disponibilidadprof')->truncate();
        $this->info('Disponibilidad de profesores eliminada correctamente.');
    }
}
