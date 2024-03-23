<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_empresas;

class Empresa_controller extends Controller
{
    public function index(){
        $datos = M_empresas::all();
        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request){
        try {
        // Crear una nueva instancia del modelo Empresa
        $datos = new M_empresas();
        $datos->Razon_social = $request->txtempresa;
        $datos->save();
    } catch (\Throwable $th) {

        return back()->with("incorrecto", "Error al registrar la empresa");
        }

        return back()->with("correcto", "Empresa registrada correctamente");
    }   

    public function update(Request $request){
        try {
            $datos = M_empresas::findOrFail($request->txtcodigo); // Encuentra la empresa por su ID
            $datos->Razon_social = $request->txtempresa; // Actualiza la razón social
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            return back()->with("correcto", "Empresa modificada correctamente");
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al modificar la empresa");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_empresas::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Empresa eliminada correctamente");
            } else {
                return back()->with("incorrecto", "La empresa no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar empresa");
        }
    }
}
