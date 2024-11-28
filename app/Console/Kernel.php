<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define las tareas programadas.
     */
    protected function schedule(Schedule $schedule)
    {
        // Agrega aquí tu comando programado
        $schedule->command('disponibilidad:clear')->monthlyOn(1, '00:00');
    }

    /**
     * Registra los comandos personalizados.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
