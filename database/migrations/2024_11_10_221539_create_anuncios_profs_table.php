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
        Schema::create('anuncios_profs', function (Blueprint $table) {
            $table->id();
            $table->string('image',80);
            $table->date('fechapub');
            $table->date('fechaev');
            $table->string('lugar',80);
            $table->string('detalle',80);           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios_profs');
    }
};
