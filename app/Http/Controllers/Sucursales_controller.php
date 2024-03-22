<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\M_sucursal;

class Sucursales_Controller extends Controller
{
    public function index()
    {
        $datos = M_sucursal::all();
        return view('Sucursales', compact('datos'));
    }

    public function create(Request $request){
        try {
            $sql=DB::insert("insert into sucursales(Nombre, Direccion, ID_empresa)values(?,?,?)",[
                $request->txtnombre,
                $request->txtdireccion,
                $request->txtidempresa
            ]);        } catch (\Throwable $th) {
                    $sql == 0;        
            }

        if ($sql==true) {
            return back()->with("correcto","Sucursal registrada correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
        
    }

    public function update(Request $request){
        try {
            $sql = DB::update(" update sucursales set Nombre = ?, Direccion, ID_empresa WHERE ID = ?",[
                $request->txtnombre,
                $request->txtdireccion,
                $request->txtidempresa,
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
            $sql=DB::delete("delete from sucursales where ID = $id",[
            ]);        } catch (\Throwable $th) {
                    $sql == 0;        
            }

        if ($sql==true) {
            return back()->with("correcto","Sucursal eliminada correctamente");
        } else {
            return back()->with("incorrecto","Error");
        }
        
    }
}
