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
        Schema::table('alumno', function (Blueprint $table) {
            $table->string('grado')->nullable()->change();
            $table->string('curso')->nullable()->change();
            $table->string('fecha')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumno', function (Blueprint $table) {
            $table->string('grado')->nullable(false)->change();
            $table->string('curso')->nullable(false)->change();
            $table->string('fecha')->nullable(false)->change();
        });
    }
};
