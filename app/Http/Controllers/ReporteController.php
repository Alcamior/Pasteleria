<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReporteController extends Controller
{
    public function show(){
        return view('reportes/dashboard');
    }

    public function showVentas(){
        return view('reportes/ventas');
    }

    public function showVentasReporte(Request $request){
        $reporte = $request->input('formulario');
        $totalPP = [];
        $totalPC = [];
        $total = [];
        $ventas = [];

        switch ($reporte) {
            case 'formulario1':

                $fecha = $request->input('fecha');

                // Validación
                $request->validate([
                    'fecha' => 'required|date',
                ]);

                // Totales
                $totalPP = DB::select('select sum(totalP) as totalPas from venta 
                inner join pedido on venta.idv = pedido.idv
                inner join producto on pedido.idpro = producto.idpro
                where producto.tipo = "Pastelería" 
                and fechaVent = ? and pedido.status="Vendido";', [$fecha]);

                $totalPC = DB::select('select sum(totalP) totalCaf from venta 
                inner join pedido on venta.idv = pedido.idv
                inner join producto on pedido.idpro = producto.idpro
                where producto.tipo = "Cafetería" 
                and fechaVent = ? and pedido.status="Vendido";', [$fecha]);

                $total = DB::select('select sum(total) as total from venta where fechaVent = ?;', [$fecha]);


                // Información para tabla
                $ventas = DB::select('select nombre, sum(cantidad) as cantidad, sum(totalP) as total
                from venta inner join pedido on venta.idv = pedido.idv
                inner join producto on pedido.idpro = producto.idpro
                where fechaVent = ? and pedido.status="Vendido"
                group by nombre;', [$fecha]);
                
                $fechaN = Carbon::createFromFormat('Y-m-d', $fecha)->format('Y - F - d');

                return redirect()->route('reportes.ventas')->with(compact('totalPP', 'totalPC', 'total', 'reporte', 'fechaN', 'ventas'));
                break;

            case 'formulario2':
                break;

            case 'formulario3':
                break;
        }        
    }
}
