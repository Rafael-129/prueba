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
            if (!Schema::hasColumn('Usuario', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
    
            if (!Schema::hasColumn('Usuario', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropTimestamps(); // Esto elimina `created_at` y `updated_at
        });
    }
};
