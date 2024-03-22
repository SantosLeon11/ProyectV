<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Clientes_controller extends Controller
{
    public function index(){
        $datos = DB::table('clientes')->get();
        return view("Clientes")->with("datos", $datos);
    }
    public function create(Request $request){
        try {
            $sql=DB::insert("insert into clientes(Razon_social,Rfc,Contacto,Direccion)values(?,?,?,?)",[
                $request->txtrazonsocial,
                $request->txtrfc,
                $request->txtcontacto,
                $request->txtdireccion
            ]);        } catch (\Throwable $th) {
                    $sql == 0;        
            }

        if ($sql==true) {
            return back()->with("correcto","Producto registrado correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
        
    }

    public function update(Request $request){
        try {
            $sql = DB::update(" update clientes set Razon_social = ?,Rfc = ?,Contacto = ?,Direccion = ? WHERE ID = ?",[
                $request->txtrazonsocial,
                $request->txtrfc,
                $request->txtcontacto,
                $request->txtdireccion,
                $request->txtcodigo
            ]);
            if($sql==0){
                $sql==1;
            }
        } catch (\Throwable $th) {
            $sql==0;
        }
        if ($sql==true) {
            return back()->with("correcto","Cliente modificado correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
    }

    public function delete($id){
        try {
            $sql=DB::delete("delete from clientes where ID = $id",[
            ]);        } catch (\Throwable $th) {
                    $sql == 0;        
            }

        if ($sql==true) {
            return back()->with("correcto","Cliente eliminado correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
        
    }
}
