<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlmacenaje;
use App\Models\Almacenaje;
use Illuminate\Http\Request;

class AlmacenajeController extends Controller
{
    public function __construct()
    {

    }

    public function create(){
        return view('almacenaje/create');
    }


    public function store(StoreAlmacenaje $request){
        $almacenaje = new Almacenaje();
        $almacenaje -> nombre = $request -> nombre;
        $almacenaje -> descripcion = $request -> descripcion;
        $almacenaje -> fechaIng = $request -> fechaIng;
        $almacenaje -> fechaCad = $request -> fechaCad;
        $almacenaje -> cantidad = $request -> cantidad;
        $almacenaje -> categoria = $request -> categoria;

        $almacenaje -> save();
        return redirect(route('principal'));
    }


    public function consultarAlmacenaje(){
        $almacenaje= Almacenaje::all();
        return view('almacenaje/consultar-almacenaje',compact('almacenaje'));
    }


    public function edit($idalm){
        $almacenaje=Almacenaje::find($idalm); 
        return view('almacenaje/edit',compact('almacenaje'));
    }

    public function update(StoreAlmacenaje $request,$idalm){
        $almacenaje = Almacenaje::find($idalm);
        $almacenaje -> nombre = $request -> nombre;
        $almacenaje -> descripcion = $request -> descripcion;
        $almacenaje -> fechaIng = $request -> fechaIng;
        $almacenaje -> fechaCad = $request -> fechaCad;
        $almacenaje -> cantidad = $request -> cantidad;
        $almacenaje -> categoria = $request -> categoria;
        $almacenaje -> save();

        return redirect()->route('principal');
    }


    public function destroy($idalm){
        $almacenaje = Almacenaje::findOrFail($idalm);
        $almacenaje->delete();
        return response()->json(['message' => 'Elemento del almacen eliminado con éxito']);
    }
}
