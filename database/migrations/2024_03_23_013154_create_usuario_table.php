<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Nombre');
            $table->string('Correo');
            $table->string('Usuario');
            $table->string('Password');
            $table->unsignedInteger('ID_sucursal')->nullable();
            $table->foreign('ID_sucursal')->references('ID')->on('sucursales');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
