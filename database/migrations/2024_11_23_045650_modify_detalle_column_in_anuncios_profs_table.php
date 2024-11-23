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
        Schema::table('anuncios_profs', function (Blueprint $table) {
            $table->text('detalle')->change(); // Cambiar a TEXT
        });
    }

    public function down(): void
    {
        Schema::table('anuncios_profs', function (Blueprint $table) {
            $table->string('detalle', 280)->change(); // Revertir a VARCHAR(280)
        });
    }
};
