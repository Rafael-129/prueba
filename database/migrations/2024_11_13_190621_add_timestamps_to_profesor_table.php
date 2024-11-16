<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToProfesorTable extends Migration
{
    public function up()
    {
        Schema::table('profesor', function (Blueprint $table) {
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::table('profesor', function (Blueprint $table) {
            $table->dropTimestamps(); 
        });
    }
}
