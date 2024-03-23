<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_orden_venta;

class Orden_venta_controller extends Controller
{
    public function index()
    {
        $datos = M_orden_venta::with(['sucursal', 'usuario', 'cliente'])->get();
        return view('Orden_venta')->with('datos', $datos);
    }

    public function create(Request $request){
        try {
            // Crear una nueva instancia del modelo Plantilla
            $datos = new M_orden_venta();
            $datos->Folio = $request->txtfolio;
            $datos->Titulo = $request->txttitulo;
            $datos->Fecha_creacion = $request->txtfechacreacion;
            $datos->Enviado_a_prod = $request->txtenviadoaprod;
            $datos->ID_sucursal = $request->txtidsucursal ?? null;
            $datos->ID_usuario = $request->txtidusuario ?? null;
            $datos->ID_cliente = $request->txtidcliente ?? null;
            $datos->save();
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al registrar la orden venta");
        }
    
        return back()->with("correcto", "Campo de plantilla registrado correctamente");
    }
    

    public function update(Request $request){
        try {
            $datos = M_orden_venta::findOrFail($request->txtcodigo); // Encuentra por su ID
            $datos->Folio = $request->txtfolio;
            $datos->Titulo = $request->txttitulo;
            $datos->Fecha_creacion = $request->txtfechacreacion;
            $datos->Enviado_a_prod = $request->txtenviadoaprod;
            $datos->ID_sucursal = $request->txtidsucursal;
            $datos->ID_usuario = $request->txtidusuario;
            $datos->ID_cliente = $request->txtidcliente;
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            return back()->with("correcto", "Modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al modificar");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_orden_venta::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Orden venta eliminado correctamente");
            } else {
                return back()->with("incorrecto", "La orden venta no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar orden venta");
        }
    }
}
