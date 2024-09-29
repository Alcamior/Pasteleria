<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Producto;

class ProductoController extends Controller
{
    public function producto(){
        return view('producto/registro-producto');
    }


    public function validarProducto(Request $request){
        $producto = new Producto();
        $producto -> tipo = $request -> tipo;
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> tamano = $request -> tamano;
        $producto -> feIngreso = $request -> feIngreso;
        $producto -> caducidad = $request -> caducidad;
        $producto -> categoria = $request -> categoria;

        $producto -> save();
        return redirect(route('principal'));
    }

    public function consultarProducto(){
        $producto= Producto::all();
        return view('producto/consultar-producto',compact('producto'));
    }

    public function destroy($idpro)
    {
        $deleted = DB::delete('delete from producto where idpro = ?', [$idpro]);
    
        if ($deleted) {
            return response()->json(['message' => 'Producto eliminado con éxito']);
        } else {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    }

    public function editarProducto($idpro){
        $producto=Producto::find($idpro); 
        return view('producto/editar-producto',compact('producto'));
    }

    public function actualizarProducto(Request $request,$idpro){
        $producto = Producto::find($idpro);
        $producto -> tipo = $request -> tipo;
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> tamano = $request -> tamano;
        $producto -> feIngreso = $request -> feIngreso;
        $producto -> caducidad = $request -> caducidad;
        $producto -> categoria = $request -> categoria;
        $producto -> save();

        return redirect()->route('principal');
    }
    
}
