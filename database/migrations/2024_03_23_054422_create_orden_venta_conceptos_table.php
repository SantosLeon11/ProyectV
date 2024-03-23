<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenVentaConceptosTable extends Migration
{
    public function up()
    {
        Schema::create('orden_venta_conceptos', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('Cantidad');
            $table->string('Unidad');
            $table->string('Observaciones')->nullable();
            $table->decimal('Precio_unitario', 10, 2);
            $table->unsignedInteger('ID_orden_venta')->nullable();
            $table->unsignedInteger('ID_articulo')->nullable();
            
            // Definir las llaves foráneas
            $table->foreign('ID_orden_venta')->references('ID')->on('orden_venta');
            $table->foreign('ID_articulo')->references('ID')->on('articulo');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orden_venta_conceptos');
    }
}
