<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdprofesorToAnunciosProfs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anuncios_profs', function (Blueprint $table) {
            // Asegurarse de que la columna no existe antes de agregarla
            if (!Schema::hasColumn('anuncios_profs', 'idprofesor')) {
                $table->unsignedBigInteger('idprofesor')->nullable(false); // Misma configuración que la tabla profesor
    
                // Agregar la clave foránea apuntando a la tabla "profesor"
                $table->foreign('idprofesor')
                      ->references('idProfesor')  // Nombre correcto del campo en "profesor"
                      ->on('profesor')           // Nombre correcto de la tabla
                      ->onDelete('cascade');     // Configuración para eliminar registros relacionados
            }
        });
    }
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncios_profs', function (Blueprint $table) {
            // Eliminar la columna idProfesor
            $table->dropForeign(['idProfesor']);
            $table->dropColumn('idProfesor');
        });
    }
}
