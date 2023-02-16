<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index()
    {
        $datos = DB::select("select * from producto");
        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request)
    {
        try {
            $sql = DB::insert("insert into producto(nombre, precio, cantidad) values(?,?,?)", [
                $request->txtNombre,
                $request->txtPrecio,
                $request->txtCantidad
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto", "Producto registrado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar producto");
        }
    }

    public function update(Request $request)
    {
        try {
            $sql = DB::update("update producto set nombre=?, precio=?, cantidad=? where id=?", [
                $request->txtNombre,
                $request->txtPrecio,
                $request->txtCantidad,
                $request->txtCodigo
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto", "Producto modificado correctamente");
        } else {
            return back()->with("incorrecto", "Error al modificar producto");
        }
    }

    public function delete($id)
    {
        try {
            $sql = DB::delete("delete from producto where id=$id"); 
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == true) {
            return back()->with("correcto", "Producto eliminado correctamente");
        } else {
            return back()->with("incorrecto", "Error al eliminar producto");
        }
    }

}
