<?php

use App\Http\Controllers\Empresa_controller;
use App\Http\Controllers\Plantillas_Controller;
use App\Http\Controllers\Clientes_Controller;
use App\Http\Controllers\Sucursales_controller;
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