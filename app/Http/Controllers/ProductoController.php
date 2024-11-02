<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\StoreProducto;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function __construct()
    {

    }

    public function create(){
        return view('producto/create');
    }


    public function store(StoreProducto $request){
        $producto = new Producto();
        $producto -> nombre = $request -> nombre;
        $producto -> tipo = $request -> tipo;
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;

        $producto -> save();
        return redirect(route('principal'));
    }


    public function consultarProdcuto(){
        $producto= Producto::all();
        return view('producto/consultar-producto',compact('producto'));
    }


    public function edit($idpro){
        $producto=Producto::find($idpro); 
        return view('producto/edit',compact('producto'));
    }

    public function update(StoreProducto $request,$idpro){
        $producto = Producto::find($idpro);
        $producto -> nombre = $request -> nombre;
        $producto -> tipo = $request -> tipo;
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> save();

        return redirect()->route('principal');
    }


    public function destroy($idpro){
        $producto = Producto::find($idpro);

        if($producto) {
            $producto->delete();
            return response()->json(['message' => 'Promoción eliminado con éxito']);
        }else{
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
    }
    
}
