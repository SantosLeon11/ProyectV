<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_sucursales;

class Sucursales_Controller extends Controller
{
    public function index()
    {
        $datos = M_sucursales::with('empresa')->get();
        return view('Sucursales', ['datos' => $datos]);
    }

    public function create(Request $request){
        try {
        // Crear una nueva instancia del modelo Sucursal
        $datos = new M_sucursales();
        $datos->Nombre = $request->txtnombre;
        $datos->Direccion = $request->txtdireccion;
        $datos->ID_empresa = $request->txtidempresa ?? null;
        $datos->save();
    } catch (\Throwable $th) {

        return back()->with("incorrecto", "Error al registrar la sucursal");
    }

        return back()->with("correcto", "Sucursal registrada correctamente");
    }


    public function update(Request $request){
        try {
            $datos = M_sucursales::findOrFail($request->txtcodigo); // Encuentra la sucursal por su ID
            $datos->Nombre = $request->txtnombre; // Actualiza el nombre
            $datos->Direccion = $request->txtdireccion; // Actualiza la dirección
            $datos->ID_empresa = $request->txtidempresa; // Actualiza el ID de la empresa
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            return back()->with("correcto", "Modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al modificar");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_sucursales::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Sucursal eliminado correctamente");
            } else {
                return back()->with("incorrecto", "la sucursal no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar la sucursal");
        }
    }
}
