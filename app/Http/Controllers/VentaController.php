<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Empleado;
use App\Models\Cliente;

class VentaController extends Controller
{
    public function consultarVenta(){
        $ventas = Venta::all();
        return view('venta/consultar-venta',compact('ventas'));
    }

    public function edit($idv){
        $venta = Venta::find($idv);
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        return view('venta/edit',compact('venta','clientes','empleados'));
    }

    public function update(Request $request,$idv){
        $venta = Venta::find($idv);
        $venta -> fecEntrega = $request -> fecentrega; 
        $venta -> ide = $request -> empleado;
        $venta -> idcli = $request -> cliente;
        $venta -> save();
        return redirect()->route('consultar-venta');
    }

    public function destroy($idv){
        $venta = Venta::find($idv);
        if($venta){
            $venta->delete();
            return response()->json(['message' => 'La venta se ha eliminado con éxito']);
        }else{
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
    }
}
