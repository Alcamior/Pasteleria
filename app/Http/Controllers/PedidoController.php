<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePedido;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ReturnTypePass;

class PedidoController extends Controller
{
    public function create(){
        $clientes = Cliente::all();
        $productos = Producto::all();
        $promociones = Promocion::where('estatus', 'Activa')->get();
        return view('pedido/create',compact('productos','promociones','clientes'));
    }


    public function store(Request $request){
        /* dd($request->all()); */

        $venta = new Venta();
        $venta->fechaVent= now();
        $venta->fecEntrega= $request->fechaP;
        $venta->total=$request->total;
        $venta->ide=Auth::guard('empleado')->user()->ide;
        $venta -> idcli = $request -> cli;
        $venta->save();

        $pedidos = json_decode($request->input('productos'), true); // true para convertir a array asociativo

        foreach ($pedidos as $item) {

            $producto = Producto::where('nombre', $item['nombre'])->first();

            $pedido = new Pedido();
            $pedido->descripcion = $item['descripcion']; 
            $pedido->fePed = now();
            $pedido->cantidad = $item['cantidad']; 
            $pedido->status = $item['status'];
            $pedido->subtotal = $item['precio']*$item['cantidad'];
            $pedido->descuento = ($item['descuento']);
            $pedido->totalP = $item['subtotal'];
            $pedido->idv = $venta->idv; 
            $pedido->idpro = $producto->idpro;
            $pedido->idprom = $item['promocion'];
            $pedido->save();
        } 
        return redirect()->route('pedido.create');
    }


    public function consultarPedido(){
        $pedidos= Pedido::all();
        return view('pedido/consultar-pedido',compact('pedidos'));
    }


    public function edit($idped){
        $pedido=Pedido::find($idped); 
        $productos = Producto::all();
        $clientes=Cliente::all();
        $promociones = Promocion::where('estatus', 'Activa')->get();
        return view('pedido/edit',compact('productos','promociones','clientes','pedido'));
    }

    public function update(Request $request,$idped){
        
        $pedido = Pedido::find($idped);

        $producto = Producto::find($request->producto);
        $precio = $producto -> precio;


        $venta = Venta::where('idv', $pedido->idv)->first();
        $venta -> total -= $pedido -> totalP;

        $pedido -> descripcion = $request -> descripcion;
        $pedido -> cantidad = $request -> cantidad;
        $pedido -> subtotal = ($precio*$pedido->cantidad);

        $pedido -> status = $request -> status;
        $pedido -> idpro = $request -> producto;
        $pedido -> idprom = $request -> promocion;

        if($request->promocion!=null){
            $promocion = Promocion::find($request->promocion);
            $descuento = $promocion->descuento;
            $pedido -> descuento = ($descuento*$pedido->subtotal);
            $pedido -> totalP = $pedido -> subtotal - ($pedido -> subtotal)*$descuento;
        }else{
            $pedido -> descuento = 0;
            $pedido -> totalP = $pedido -> subtotal;
        }

        $venta -> total = $pedido -> totalP;
        
        $pedido -> save();
        $venta -> save();

        $pedidos= Pedido::all();
        return redirect()->route('consultar-pedido',compact('pedidos'));
    }


    public function destroy($idped){

        $pedido = Pedido::find($idped);

        if($pedido) {
            $venta = Venta::find($pedido->idv);
            $venta -> total -= $pedido -> totalP;
            $pedido -> delete();
            $venta->save();
            return response()->json(['message' => 'Pedido eliminado con éxito']);
        }else{
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
    }
}
