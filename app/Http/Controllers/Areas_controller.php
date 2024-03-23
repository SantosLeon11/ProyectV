<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_areas;

class Areas_Controller extends Controller
{
    public function index()
    {
        $datos = M_areas::with('sucursal')->get();
        return view('Areas', ['datos' => $datos]);
    }

    public function create(Request $request){
        try {
            $datos = new M_areas(); // Crear una nueva instancia del modelo Area
            $datos->Nombre = $request->txtnombre;
            $datos->ID_sucursal = $request->txtidsucursal; // Puedes establecer null si es necesario, ya que ID_sucursal puede ser nulo según tu lógica
            $datos->save(); // Guardar el nuevo registro en la base de datos
        } catch (\Throwable $th) {
            return back()->with("incorrecto","Error al registrar el área");
        }
    
        return back()->with("correcto","Área registrada correctamente");
    }

    public function update(Request $request){
        $sql = false;
        try {
            $datos = M_areas::findOrFail($request->txtcodigo); // Encuentra el área por su ID
            $datos->Nombre = $request->txtnombre; // Actualiza el nombre
            $datos->ID_sucursal = $request->txtidsucursal; // Actualiza el ID de la sucursal
    
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
            $datos = M_areas::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Area eliminada correctamente");
            } else {
                return back()->with("incorrecto", "El area no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar el area");
        }
    }
}
