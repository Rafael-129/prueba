<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('grado', function (Blueprint $table) {
            $table->string('Grado', 100)->nullable();
            $table->string('Seccion', 50)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('grado', function (Blueprint $table) {
            $table->dropColumn(['Grado', 'Seccion']);
        });
    }
};