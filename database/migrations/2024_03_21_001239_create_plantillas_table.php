<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillasTable extends Migration
{
    public function up()
    {
        Schema::create('plantillas', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Nombre');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plantillas');
    }
}
