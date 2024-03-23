<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenVentaTable extends Migration
{
    public function up()
    {
        Schema::create('orden_venta', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Folio');
            $table->string('Titulo');
            $table->date('Fecha_creacion');
            $table->boolean('Enviado_a_prod')->default(false);
            $table->unsignedInteger('ID_sucursal')->nullable();
            $table->unsignedInteger('ID_usuario')->nullable();
            $table->unsignedInteger('ID_cliente')->nullable();

            // Declaración de las llaves foráneas
            $table->foreign('ID_sucursal')->references('ID')->on('sucursales');
            $table->foreign('ID_usuario')->references('ID')->on('usuario');
            $table->foreign('ID_cliente')->references('ID')->on('cliente');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orden_venta');
    }
}
