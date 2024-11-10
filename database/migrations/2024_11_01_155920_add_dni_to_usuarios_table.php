<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Usuario', function (Blueprint $table) {
            if (!Schema::hasColumn('Usuario', 'DNI')) {
                $table->string('DNI')->unique(); // Agregar la columna DNI solo si no existe
            }
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Usuario', function (Blueprint $table) {
            $table->dropColumn('DNI'); // Eliminar la columna si se revierte la migración
        });
    }
};
