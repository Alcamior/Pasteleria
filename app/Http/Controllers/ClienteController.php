<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCliente;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function __construct()
    {

    }

    public function create(){
        return view('cliente/create');
    }


    public function store(StoreCliente $request){
        $cliente = new Cliente();
        $cliente -> nombre = $request -> nombre;
        $cliente -> ap = $request -> ap;
        $cliente -> am = $request -> am;
        $cliente -> genero = $request -> genero;
        $cliente -> direccion = $request -> direccion;
        $cliente -> fenac = $request -> fenac;
        $cliente -> telefono = $request -> telefono;
        $cliente -> email = $request -> email;
        $cliente -> contrasena = Hash::make($request->contrasena);

        $cliente -> save();
        return redirect(route('principal'));
    }


    public function consultarCliente(){
        $cliente= Cliente::all();
        return view('cliente/consultar-cliente',compact('cliente'));
    }


    public function edit($idcli){
        $cliente=Cliente::find($idcli); 
        return view('cliente/edit',compact('cliente'));
    }

    public function update(StoreCliente $request,$idcli){
        $cliente = Cliente::find($idcli);
        $cliente -> nombre = $request -> nombre;
        $cliente -> ap = $request -> ap;
        $cliente -> am = $request -> am;
        $cliente -> genero = $request -> genero;
        $cliente -> direccion = $request -> direccion;
        $cliente -> fenac = $request -> fenac;
        $cliente -> telefono = $request -> telefono;
        $cliente -> email = $request -> email;
        $cliente -> contrasena = Hash::make($request->contrasena);
        $cliente -> save();

        return redirect()->route('principal');
    }


    public function destroy($idcli){
        $cliente = Cliente::find($idcli);
        if($cliente){
            $cliente->delete();
            return response()->json(['message' => 'Cliente eliminado con éxito']);
        }else{
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }
    }


    public function editSelf()
    {
        $cliente = Auth::guard('cliente')->user();
        return view('cliente.edit', ['cliente' => $cliente]);
    }
}
