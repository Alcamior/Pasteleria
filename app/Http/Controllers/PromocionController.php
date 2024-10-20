<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromocion;
use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function __construct()
    {

    }

    public function create(){
        return view('promocion/create');
    }


    public function store(StorePromocion $request){
        $promocion = new Promocion();
        $promocion -> codigo = $request -> codigo;
        $promocion -> descuento = $request -> descuento;
        $promocion -> dias = $request -> dias;
        $promocion -> descripcion = $request -> descripcion;
        $promocion -> estatus = $request -> estatus;

        $promocion -> save();
        return redirect(route('principal'));
    }


    public function consultarPromocion(){
        $promocion= Promocion::all();
        return view('promocion/consultar-promocion',compact('promocion'));
    }


    public function edit($idprom){
        $promocion=Promocion::find($idprom); 
        return view('promocion/edit',compact('promocion'));
    }

    public function update(StorePromocion $request,$idprom){
        $promocion = Promocion::find($idprom);
        $promocion -> codigo = $request -> codigo;
        $promocion -> descuento = $request -> descuento;
        $promocion -> dias = $request -> dias;
        $promocion -> descripcion = $request -> descripcion;
        $promocion -> estatus = $request -> estatus;
        $promocion -> save();

        return redirect()->route('principal');
    }


    public function destroy($idprom){
        $promocion = Promocion::find($idprom);

        if($promocion) {
            $promocion->delete();
            return response()->json(['message' => 'Promoción eliminado con éxito']);
        }else{
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
        
    }
}
