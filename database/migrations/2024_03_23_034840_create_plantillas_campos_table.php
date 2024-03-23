<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillasCamposTable extends Migration
{
    public function up()
    {
        Schema::create('plantillas_campos', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Nombre');
            $table->string('Tipo');
            $table->unsignedInteger('ID_plantilla')->nullable();
            $table->foreign('ID_plantilla')->references('ID')->on('plantillas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('plantillas_campos');
    }
}
