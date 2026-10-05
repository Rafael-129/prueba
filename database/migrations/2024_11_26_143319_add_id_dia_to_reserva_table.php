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
        Schema::table('reserva', function (Blueprint $table) {
            $table->unsignedInteger('idDia')->nullable();
            $table->foreign('idDia')->references('idDia')->on('dia');
        });
    }

    public function down(): void
    {
        Schema::table('reserva', function (Blueprint $table) {
            $table->dropForeign(['idDia']);
            $table->dropColumn('idDia');
        });
    }

};
