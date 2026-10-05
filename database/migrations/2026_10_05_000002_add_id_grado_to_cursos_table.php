<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->string('idGrado', 50)->nullable();
            $table->foreign('idGrado')
                ->references('idGrado')
                ->on('grado');
        });
    }

    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['idGrado']);
            $table->dropColumn('idGrado');
        });
    }
};