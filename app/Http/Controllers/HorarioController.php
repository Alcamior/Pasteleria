<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHorario;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function __construct()
    {

    }

    public function create(){
        return view('horario/create');
    }


    public function store(StoreHorario $request){
        $horario = new Horario();
        $horario -> horaentrada = $request -> horaentrada;
        $horario -> horasalida = $request -> horasalida;
        $horario -> dia = $request -> dia;

        $horario -> save();
        return redirect(route('principal'));
    }


    public function consultarHorario(){
        $horario= Horario::all();
        return view('horario/consultar-horario',compact('horario'));
    }


    public function edit($idh){
        $horario=Horario::find($idh); 
        return view('horario/edit',compact('horario'));
    }

    public function update(StoreHorario $request,$idh){
        $horario = Horario::find($idh);
        $horario -> horaentrada = $request -> horaentrada;
        $horario -> horasalida = $request -> horasalida;
        $horario -> dia = $request -> dia;
        $horario -> save();

        return redirect()->route('principal');
    }


    public function destroy($idh){
        $horario = Horario::findOrFail($idh);
        $horario->delete();
        return response()->json(['message' => 'Horario eliminado con éxito']);
    }
}
