<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Agregar la columna idDia a la tabla reserva
        DB::statement('ALTER TABLE reserva ADD COLUMN idDia INT NULL AFTER idEstadoReserva');
    }

    public function down()
    {
        // Eliminar la columna idDia en caso de que se haga rollback
        DB::statement('ALTER TABLE reserva DROP COLUMN idDia');
    }

};
