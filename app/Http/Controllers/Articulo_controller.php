<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_articulo;

class Articulo_Controller extends Controller
{
    public function index()
    {
        $datos = M_articulo::with('plantilla')->get();
        return view('Articulo', ['datos' => $datos]);
    }

    public function create(Request $request){
        try {
            $datos = new M_articulo(); // Crear una nueva instancia del modelo Area
            $datos->Codigo = $request->txtcodigo;
            $datos->Descripcion = $request->txtdescripcion; 
            $datos->Unidad = $request->txtunidad; 
            $datos->ID_plantilla = $request->txtidplantilla ?? null; 
            $datos->save(); // Guardar el nuevo registro en la base de datos
        } catch (\Throwable $th) {
            return back()->with("incorrecto","Error al registrar el área");
        }
    
        return back()->with("correcto","Área registrada correctamente");
    }

    public function update(Request $request){
        $sql = false;
        try {
            $datos = M_articulo::findOrFail($request->txtid); 
            $datos->Codigo = $request->txtcodigo;
            $datos->Descripcion = $request->txtdescripcion; 
            $datos->Unidad = $request->txtunidad; 
            $datos->ID_plantilla = $request->txtidplantilla ?? null; 
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            $sql = true;
        } catch (\Throwable $th) {
            $sql = false;
        }
        
        if ($sql) {
            return back()->with("correcto", "Modificado correctamente");
        } else {
            return back()->with("incorrecto", "Error");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_articulo::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Articulo eliminado correctamente");
            } else {
                return back()->with("incorrecto", "El articulo no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar el articulo");
        }
    }
}
