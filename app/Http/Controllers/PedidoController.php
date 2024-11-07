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
        dd($request->all());

        $venta = new Venta();
        $venta->fechaVent= now();
        $venta->fecEntrega= now();
        $venta->total=$request->total;
        $venta->ide=Auth::guard('empleado')->user()->ide;
        $venta->save();

        $pedidos = json_decode($request->input('productos'), true); // true para convertir a array asociativo

        foreach ($pedidos as $item) {

            $producto = Producto::where('nombre', $item['nombre'])->first();

            $pedido = new Pedido();
            $pedido->descripcion = $item['descripcion']; 
            $pedido->fePed = now();
            $pedido->cantidad = $item['cantidad']; 
            $pedido->status = "Vendido";
            $pedido->subtotal = $item['precio']*$item['cantidad'];
            $pedido->descuento = ($item['descuento'] / 100) * $pedido->subtotal;
            $pedido->totalP = $item['subtotal'];
            $pedido->idv = $venta->idv; 
            $pedido->idpro = $producto->idpro;
            $pedido->idprom = $item['promocion'];
            $pedido->save();
        } 
        return redirect()->route('pedido.create');
    }


    public function consultarProducto(){
/*         $producto= Producto::all();
        return view('producto/consultar-producto',compact('producto'));
    }


    public function edit($idped){
/*         $producto=Producto::find($idpro); 
        return view('producto/edit',compact('producto')); */
    }

    public function update(StorePedido $request,$idped){
/*         $producto = Producto::find($idpro);
        $producto -> nombre = $request -> nombre;
        $producto -> tipo = $request -> tipo;
        $producto -> descripcion = $request -> descripcion;
        $producto -> precio = $request -> precio;
        $producto -> save();

        return redirect()->route('principal'); */
    }


    public function destroy($idpro){
/*         $producto = Producto::find($idpro);

        if($producto) {
            $producto->delete();
            return response()->json(['message' => 'Promoción eliminado con éxito']);
        }else{
            return response()->json(['message' => 'Registro no encontrado'], 404);
        } */
    }
}
