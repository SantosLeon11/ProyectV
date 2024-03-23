<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Nombre');
            $table->unsignedInteger('ID_sucursal')->nullable();
            $table->foreign('ID_sucursal')->references('ID')->on('sucursales');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('areas');
    }
}

