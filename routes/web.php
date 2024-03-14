<?php

use App\Http\Controllers\Empresa_controller;
use Illuminate\Support\Facades\Route;

Route::get("/", [Empresa_controller::class,"index"])->name("empresa.index");

//Rutas
Route::post("/registrarEmpresa", [Empresa_controller::class,"create"])->name("empresa.create");
Route::post("/modificarEmpresa", [Empresa_controller::class,"update"])->name("empresa.update");
Route::get("/eliminarEmpresa--{id}", [Empresa_controller::class,"delete"])->name("empresa.delete");