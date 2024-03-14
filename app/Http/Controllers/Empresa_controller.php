<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Empresa_controller extends Controller
{
    public function index(){
        $datos=DB::select("SELECT * FROM tbl_empresas");
        return view("welcome")->with("datos",$datos);
    }
    public function create(Request $request){
        try {
            $sql=DB::insert("insert into tbl_empresas(Razon_social)values(?)",[
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
            $sql = DB::update(" update tbl_empresas set Razon_social=? WHERE ID_Empresa = ?",[
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
            return back()->with("correcto","Producto modificado correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
    }

    public function delete($id){
        try {
            $sql=DB::delete("delete from tbl_empresas where ID_Empresa = $id",[
            ]);        } catch (\Throwable $th) {
                    $sql == 0;        
            }

        if ($sql==true) {
            return back()->with("correcto","Producto eliminado correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
        
    }
}
