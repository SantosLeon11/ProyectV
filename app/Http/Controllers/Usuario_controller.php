<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_usuario;

class Usuario_Controller extends Controller
{
    public function index()
    {
        $datos = M_usuario::all();
        return view('Usuario', ['datos' => $datos]);
    }

    public function create(Request $request){
        try {
        // Crear una nueva instancia del modelo Sucursal
        $datos = new M_usuario();
        $datos->Nombre = $request->txtnombre;
        $datos->Correo = $request->txtcorreo;
        $datos->Usuario = $request->txtusuario;
        $datos->Password = $request->txtpassword;
        $datos->ID_sucursal = $request->txtidsucursal ?? null;
        $datos->save();
    } catch (\Throwable $th) {

        return back()->with("incorrecto", "Error al registrar la sucursal");
    }

        return back()->with("correcto", "Sucursal registrada correctamente");
    }


    public function update(Request $request){
        try {
            $datos = M_usuario::findOrFail($request->txtcodigo); // Encuentra la sucursal por su ID
            $datos->Nombre = $request->txtnombre;
            $datos->Correo = $request->txtcorreo;
            $datos->Usuario = $request->txtusuario;
            $datos->Password = $request->txtpassword;
            $datos->ID_sucursal = $request->txtidsucursal; // Actualiza el ID de la empresa
    
            $datos->save(); // Guarda los cambios en la base de datos
    
            return back()->with("correcto", "Modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al modificar");
        }
    }
    

    public function delete($id)
    {
        try {
            $datos = M_usuario::find($id);
            if ($datos) {
                $datos->delete();
                return back()->with("correcto", "Usuario eliminado correctamente");
            } else {
                return back()->with("incorrecto", "El usuario no existe");
            }
        } catch (\Throwable $th) {
            return back()->with("incorrecto", "Error al eliminar el usuario");
        }
    }
}
