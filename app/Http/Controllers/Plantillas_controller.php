<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_plantillas;

class Plantillas_Controller extends Controller
{
    public function index()
    {
        $datos = M_plantillas::all();
        return view("Plantillas")->with("datos", $datos);
    }

    public function create(Request $request){
        try {
            // Crear una nueva instancia del modelo Plantilla
            $datos = new M_plantillas();
            $datos->Nombre = $request->txtnombre;
            $datos->save();
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al registrar la plantilla");
        }
    
        return back()->with("correcto", "Plantilla registrada correctamente");
    }
    

    public function update(Request $request){
        try {
            $datos = M_plantillas::findOrFail($request->txtcodigo); // Encuentra la plantilla por su ID
            $datos->Nombre = $request->txtnombre; // Actualiza el nombre
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            return back()->with("correcto", "Modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al modificar");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_plantillas::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Plantilla eliminada correctamente");
            } else {
                return back()->with("incorrecto", "La plantilla no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar plantilla");
        }
    }
}
