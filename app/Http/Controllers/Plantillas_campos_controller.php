<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_plantillas_campos;

class Plantillas_campos_controller extends Controller
{
    public function index()
    {
        $datos = M_plantillas_campos::with('plantilla')->get();
        return view("Plantillas_campos")->with("datos", $datos);
    }

    public function create(Request $request){
        try {
            // Crear una nueva instancia del modelo Plantilla
            $datos = new M_plantillas_campos();
            $datos->Nombre = $request->txtnombre;
            $datos->Tipo = $request->txttipo;
            $datos->ID_plantilla = $request->txtidplantilla ?? null;
            $datos->save();
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al registrar el campo de plantilla");
        }
    
        return back()->with("correcto", "Campo de plantilla registrado correctamente");
    }
    

    public function update(Request $request){
        try {
            $datos = M_plantillas_campos::findOrFail($request->txtcodigo); // Encuentra por su ID
            $datos->Nombre = $request->txtnombre;
            $datos->Tipo = $request->txttipo;
            $datos->ID_plantilla = $request->txtidplantilla ?? null;
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            return back()->with("correcto", "Modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al modificar");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_plantillas_campos::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Campo de plantilla eliminada correctamente");
            } else {
                return back()->with("incorrecto", "El campo de plantilla no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar campo de plantilla");
        }
    }
}
