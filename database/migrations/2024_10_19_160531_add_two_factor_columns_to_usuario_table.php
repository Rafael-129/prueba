<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->timestamps(); // Esto añade `created_at` y `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('Usuario', function (Blueprint $table) {
        $table->dropTimestamps(); // Esto elimina `created_at` y `updated_at`
    });
}
};
