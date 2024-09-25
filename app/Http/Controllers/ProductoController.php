<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

}
