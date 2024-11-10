<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Horario;
use App\Models\NotaHorario;
use Illuminate\Support\Facades\DB;

class NotaHorarioController extends Controller
{
    public function asign(){
        $empleados = Empleado::all();
        $horarios = Horario::all();

        return view('horario.asign',compact('empleados','horarios'));
    }

    public function asignStore(Request $request){
        $notaHorario = new NotaHorario();
        $notaHorario -> idh = $request -> horario;
        $notaHorario -> ide = $request -> empleado;
        $notaHorario->save();
        return redirect(route('principal'));
    }

    public function asignShow(){
        $horariosAsig = DB::select('select concat(nombre," ",ap, " ", am) as nombreComp, 
        dia, horaentrada, horasalida from empleado 
        inner join nota_horario on empleado.ide = nota_horario.ide
        inner join horario on nota_horario.idh = horario.idh;');

        return view('horario.asignShow',compact('horariosAsig'));
    }
}
