<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_orden_venta_conceptos;

class Orden_venta_conceptos_controller extends Controller
{
    public function index()
    {
        $datos = M_orden_venta_conceptos::with('ordenVenta','articulo')->get();
        return view("Orden_venta_conceptos")->with("datos", $datos);
    }

    public function create(Request $request){
        try {
            // Crear una nueva instancia del modelo Plantilla
            $datos = new M_orden_venta_conceptos();
            $datos->Cantidad = $request->txtcantidad;
            $datos->Unidad = $request->txtunidad;
            $datos->Observaciones = $request->txtobservaciones;
            $datos->Precio_unitario = $request->txtpreciounitario;
            $datos->ID_orden_venta = $request->txtidordenventa ?? null;
            $datos->ID_articulo = $request->txtidarticulo ?? null;
            $datos->save();
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al registrar la orden venta");
        }
    
        return back()->with("correcto", "Campo de plantilla registrado correctamente");
    }
    

    public function update(Request $request){
        try {
            $datos = M_orden_venta_conceptos::findOrFail($request->txtcodigo); // Encuentra por su ID
            $datos->Cantidad = $request->txtcantidad;
            $datos->Unidad = $request->txtunidad;
            $datos->Observaciones = $request->txtobservaciones;
            $datos->Precio_unitario = $request->txtpreciounitario;
            $datos->ID_orden_venta = $request->txtidordenventa ?? null;
            $datos->ID_articulo = $request->txtidarticulo ?? null;
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            return back()->with("correcto", "Modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al modificar");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_orden_venta_conceptos::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Orden venta concepto eliminado correctamente");
            } else {
                return back()->with("incorrecto", "El concepto de orden venta no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar concepto orden venta");
        }
    }
}
