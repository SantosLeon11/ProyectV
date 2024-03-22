<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Empresa_controller extends Controller
{
    public function index(){
        $datos = DB::table('empresas')->get();
        return view("welcome")->with("datos", $datos);
    }
    public function create(Request $request){
        try {
            $sql=DB::insert("insert into empresas(Razon_social)values(?)",[
                $request->txtempresa
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
            $sql = DB::update(" update empresas set Razon_social=? WHERE ID = ?",[
                $request -> txtempresa,
                $request -> txtcodigo
            ]);
            if($sql==0){
                $sql==1;

            }
        } catch (\Throwable $th) {
            $sql==0;
        }
        if ($sql==true) {
            return back()->with("correcto","Empresa modificada correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
    }

    public function delete($id){
        try {
            $sql=DB::delete("delete from empresas where ID = $id",[
            ]);        } catch (\Throwable $th) {
                    $sql == 0;        
            }

        if ($sql==true) {
            return back()->with("correcto","Empresa eliminada correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
        
    }
}
