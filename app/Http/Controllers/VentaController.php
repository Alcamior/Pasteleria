<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    public function consultarVenta(){
        $ventas = Venta::all();
        return view('venta/consultar-venta',compact('ventas'));
    }

    public function edit($idv){
        $venta = Venta::find($idv);
        return view('');
    }


}
