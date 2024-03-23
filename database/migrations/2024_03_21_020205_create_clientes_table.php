<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Razon_social');
            $table->string('Rfc')->nullable();
            $table->string('Contacto')->nullable();
            $table->string('Direccion')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
