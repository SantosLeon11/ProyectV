<?php

namespace App\Http\Controllers;

use App\Models\M_cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Clientes_controller extends Controller
{
    public function index(){
        $datos = M_cliente::all();
        return view("Clientes")->with("datos", $datos);
    }
    
public function create(Request $request){
    try {
        // Crear un nuevo registro de cliente
        $datos = new M_cliente();
        $datos->Razon_social = $request->txtrazonsocial;
        $datos->Rfc = $request->txtrfc;
        $datos->Contacto = $request->txtcontacto;
        $datos->Direccion = $request->txtdireccion;
        $datos->save();

        }  catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al registrar el cliente");
        }

        return back()->with("correcto", "Cliente registrado correctamente");
    }

    public function update(Request $request){
        try {
            $datos = M_cliente::findOrFail($request->txtcodigo); // Encuentra el cliente por su ID
            $datos->Razon_social = $request->txtrazonsocial; // Actualiza la razón social
            $datos->Rfc = $request->txtrfc; // Actualiza el RFC
            $datos->Contacto = $request->txtcontacto; // Actualiza el contacto
            $datos->Direccion = $request->txtdireccion; // Actualiza la dirección
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            return back()->with("correcto", "Cliente modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al modificar el cliente");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_cliente::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Cliente eliminado correctamente");
            } else {
                return back()->with("incorrecto", "El cliente no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar el cliente");
        }
    }
}
