<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteVentaController extends Controller
{
    public function show(){
        return view('reportes/dashboard');
    }

    public function showVentas(){
        return view('reportes.ventas.ventas');
    }

    public function showVentasReporte(Request $request){
        $reporte = $request->input('formulario');

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

                $total = $totalPP[0]->totalPas + $totalPC[0]->totalCaf;


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
                $fecha = $request->input('fecha');
                // Validación
                $request->validate([
                    'fecha' => 'required|date',
                ]);

                //Fechas
                $fechaInicio = Carbon::parse($fecha)->startOfDay();
                $fechaFin = Carbon::parse($fechaInicio)->addWeek(1)->endOfDay();

                //Totales
                $totalPP = DB::select('select sum(totalP) as totalPas from venta 
                inner join pedido on venta.idv = pedido.idv
                inner join producto on pedido.idpro = producto.idpro
                where producto.tipo = "Pastelería" 
                and (fechaVent between ? and ?) 
                and pedido.status = "Vendido";', [$fechaInicio, $fechaFin]);

                $totalPC = DB::select('select sum(totalP) as totalCaf from venta 
                inner join pedido on venta.idv = pedido.idv
                inner join producto on pedido.idpro = producto.idpro
                where producto.tipo = "Cafetería" 
                and (fechaVent between ? and ?) 
                and pedido.status = "Vendido";', [$fechaInicio, $fechaFin]);

                $total = $totalPP[0]->totalPas + $totalPC[0]->totalCaf;


                // Información para gráfico
                $conVentasP = DB::select('select fechaVent, sum(totalP) as total
                from venta inner join pedido on venta.idv = pedido.idv
                inner join producto on pedido.idpro = producto.idpro
                where producto.tipo = "Pastelería" 
                and (fechaVent between ? and ?) 
                and pedido.status="Vendido"
                group by fechaVent;', [$fechaInicio, $fechaFin]);

                $conVentasC = DB::select('select fechaVent, sum(totalP) as total
                from venta inner join pedido on venta.idv = pedido.idv
                inner join producto on pedido.idpro = producto.idpro
                where producto.tipo = "Cafetería" 
                and (fechaVent between ? and ?) 
                and pedido.status="Vendido"
                group by fechaVent;', [$fechaInicio, $fechaFin]);

                $periodo = CarbonPeriod::create($fechaInicio, $fechaFin);
                $fechas = [];
                $dias = [];
                foreach ($periodo as $fecha) {
                    $fechas[] = $fecha->format('Y-m-d');
                    $dias[] = $fecha->locale('es')->isoFormat('dddd');
                }

                $ventasP = array_fill(0, count($fechas), 0); 
                $ventasC = array_fill(0, count($fechas), 0);

                foreach ($conVentasP as $venta) {
                    foreach ($fechas as $i => $fecha) {
                        if ($venta->fechaVent === $fecha) {
                            $ventasP[$i] = $venta->total;
                        }
                    }
                }

                foreach ($conVentasC as $venta) {
                    foreach ($fechas as $i => $fecha) {
                        if ($venta->fechaVent === $fecha) {
                            $ventasC[$i] = $venta->total;
                        }
                    }
                }

                $jsonData = json_encode([
                    'dias' => $dias,
                    'ventasP' => $ventasP,
                    'ventasC' => $ventasC,
                ]);

                //Modificar formato de fecha 
                $fechaInicioN = $fechaInicio->format('Y - F - d');
                $fechaFinN = $fechaFin->format('Y - F - d');

                //Devolución de datos
                return redirect()->route('reportes.ventas')->with(compact('fechaInicioN', 'fechaFinN', 'totalPP', 'totalPC', 'total', 'jsonData', 'reporte'));

                break;

            case 'formulario3':
                break;
        }        
    }

    public function generarDiarioPDF(Request $request){
        $fechaN = $request->input('fechaN');
        $totalPP = $request->input('totalPP');
        $totalPC = $request->input('totalPC');
        $total = $request->input('total');
        $ventas = json_decode($request->input('ventas'));

        $data = [
            'fechaN' => $fechaN,
            'totalPP' => $totalPP,
            'totalPC' => $totalPC,
            'total' => $total,
            'ventas' => $ventas
        ];

        $pdf = Pdf::loadView('reportes.ventas.ventas_diarias_pdf', $data);
        return $pdf->download('reporte_ventas_diarias.pdf');
    }

    public function generarSemanalPDF(Request $request){
        $fechaInicioN = $request->input('fechaInicioN');
        $fechaFinN = $request->input('fechaFinN');
        $totalPP = $request->input('totalPP');
        $totalPC = $request->input('totalPC');
        $total = $request->input('total');
        $graficoImagen = $request->input('graficoImagen');

        // Cargar la librería DOMPDF
        $pdf = App::make('dompdf.wrapper');

        // Construir el contenido HTML del PDF
        $html = view('reportes.ventas.ventas_semanales_pdf', [
            'fechaInicioN' => $fechaInicioN,
            'fechaFinN' => $fechaFinN,
            'totalPP' => $totalPP,
            'totalPC' => $totalPC,
            'total' => $total,
            'graficoImagen' => $graficoImagen
        ])->render();

        // Cargar el contenido HTML al PDF
        $pdf->loadHTML($html);

        // Descargar el PDF
        return $pdf->download('reporte_ventas_semanales.pdf');
    }
}
