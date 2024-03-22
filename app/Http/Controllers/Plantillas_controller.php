<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Plantillas_Controller extends Controller
{
    public function index()
    {
        $datos = DB::table('plantillas')->get();
        return view("Plantillas")->with("datos", $datos);
    }

    public function create(Request $request){
        try {
            $sql=DB::insert("insert into plantillas(Razon_social)values(?)",[
                $request->txtnombre
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
            $sql = DB::update(" update plantillas set Nombre = ? WHERE ID = ?",[
                $request -> txtnombre,
                $request -> txtcodigo
            ]);
            if($sql==0){
                $sql==1;

            }
        } catch (\Throwable $th) {
            $sql==0;
        }
        if ($sql==true) {
            return back()->with("correcto","Modificado correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
    }

    public function delete($id){
        try {
            $sql=DB::delete("delete from plantillas where ID = $id",[
            ]);        } catch (\Throwable $th) {
                    $sql == 0;        
            }

        if ($sql==true) {
            return back()->with("correcto","Plantilla eliminada correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
        
    }
}
