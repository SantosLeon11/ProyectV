<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucursalesTable extends Migration
{
    public function up()
    {

        Schema::disableForeignKeyConstraints();

        Schema::create('sucursales', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Nombre');
            $table->string('Direccion');
            //Declaracion de la llave foranea en nuestra migracion
            $table->unsignedInteger('ID_empresa');
            $table->foreign('ID_empresa')->references('ID')->on('empresas');
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
        Schema::dropIfExists('sucursales');
    }
}
