<?php

use App\Http\Controllers\Empresa_controller;
use App\Http\Controllers\Plantillas_Controller;
use App\Http\Controllers\Clientes_Controller;
use App\Http\Controllers\Sucursales_controller;
use App\Http\Controllers\Areas_controller;
use App\Http\Controllers\Usuario_controller;
use App\Http\Controllers\Articulo_controller;
use App\Http\Controllers\Plantillas_campos_controller;
use App\Http\Controllers\Orden_venta_controller;
use App\Http\Controllers\Orden_venta_conceptos_controller;
use Illuminate\Support\Facades\Route;

Route::get("/", [Empresa_controller::class,"index"])->name("empresa.index");

//Rutas
Route::post("/registrarEmpresa", [Empresa_controller::class,"create"])->name("empresa.create");
Route::post("/modificarEmpresa", [Empresa_controller::class,"update"])->name("empresa.update");
Route::get("/eliminarEmpresa--{id}", [Empresa_controller::class,"delete"])->name("empresa.delete");

//Rutas para plantillas
Route::get("/plantillas", [Plantillas_controller::class,"index"])->name("plantilla.index");

Route::post("/registrarPlantilla", [Plantillas_controller::class,"create"])->name("plantilla.create");
Route::post("/modificarPlantilla", [Plantillas_controller::class,"update"])->name("plantilla.update");
Route::get("/eliminarPlantilla--{id}", [Plantillas_controller::class,"delete"])->name("plantilla.delete");

//Rutas para clientes
Route::get("/clientes", [Clientes_controller::class,"index"])->name("cliente.index");

Route::post("/registrarCliente", [Clientes_controller::class,"create"])->name("cliente.create");
Route::post("/modificarCliente", [Clientes_controller::class,"update"])->name("cliente.update");
Route::get("/eliminarCliente--{id}", [Clientes_controller::class,"delete"])->name("cliente.delete");

//Rutas para sucursales
Route::get("/sucursales", [Sucursales_controller::class,"index"])->name("cliente.index");

Route::post("/registrarSucursal", [Sucursales_controller::class,"create"])->name("sucursal.create");
Route::post("/modificarSucursal", [Sucursales_controller::class,"update"])->name("sucursal.update");
Route::get("/eliminarSucursal--{id}", [Sucursales_controller::class,"delete"])->name("sucursal.delete");

//Rutas para areas
Route::get("/areas", [Areas_controller::class,"index"])->name("area.index");

Route::post("/registrarArea", [Areas_controller::class,"create"])->name("area.create");
Route::post("/modificarArea", [Areas_controller::class,"update"])->name("area.update");
Route::get("/eliminarArea--{id}", [Areas_controller::class,"delete"])->name("area.delete");

//Rutas para usuario
Route::get("/usuarios", [Usuario_controller::class,"index"])->name("usuario.index");

Route::post("/registrarUsuario", [Usuario_controller::class,"create"])->name("usuario.create");
Route::post("/modificarUsuario", [Usuario_controller::class,"update"])->name("usuario.update");
Route::get("/eliminarUsuario--{id}", [Usuario_controller::class,"delete"])->name("usuario.delete");

//Rutas para articulo
Route::get("/articulos", [Articulo_controller::class,"index"])->name("usuario.index");

Route::post("/registrarArticulo", [Articulo_controller::class,"create"])->name("articulo.create");
Route::post("/modificarArticulo", [Articulo_controller::class,"update"])->name("articulo.update");
Route::get("/eliminarArticulo--{id}", [Articulo_controller::class,"delete"])->name("articulo.delete");

//Rutas para plantillas campo
Route::get("/plantillascampos", [Plantillas_campos_controller::class,"index"])->name("plantillacampo.index");

Route::post("/registrarPlantillacampo", [Plantillas_campos_controller::class,"create"])->name("plantillacampo.create");
Route::post("/modificarPlantillacampo", [Plantillas_campos_controller::class,"update"])->name("plantillacampo.update");
Route::get("/eliminarPlantillacampo--{id}", [Plantillas_campos_controller::class,"delete"])->name("plantillacampo.delete");

//Rutas para orden venta
Route::get("/ordenventa", [Orden_venta_controller::class,"index"])->name("plantillacampo.index");

Route::post("/registrarOrdenventa", [Orden_venta_controller::class,"create"])->name("ordenventa.create");
Route::post("/modificarOrdenventa", [Orden_venta_controller::class,"update"])->name("ordenventa.update");
Route::get("/eliminarOrdenventa--{id}", [Orden_venta_controller::class,"delete"])->name("ordenventa.delete");

//Rutas para orden venta conceptos
Route::get("/ordenventaconceptos", [Orden_venta_conceptos_controller::class,"index"])->name("ordenventaconceptos.index");

Route::post("/registrarOrdenventaconceptos", [Orden_venta_conceptos_controller::class,"create"])->name("ordenventaconceptos.create");
Route::post("/modificarOrdenventaconceptos", [Orden_venta_conceptos_controller::class,"update"])->name("ordenventaconceptos.update");
Route::get("/eliminarOrdenventaconceptos--{id}", [Orden_venta_conceptos_controller::class,"delete"])->name("ordenventaconceptos.delete");