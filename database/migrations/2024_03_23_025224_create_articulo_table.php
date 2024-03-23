<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Codigo');
            $table->string('Descripcion');
            $table->string('Unidad');
            $table->unsignedInteger('ID_plantilla')->nullable();
            $table->foreign('ID_plantilla')->references('ID')->on('plantillas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articulo');
    }
}

