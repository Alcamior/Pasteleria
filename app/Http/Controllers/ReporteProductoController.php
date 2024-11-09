<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class ReporteProductoController extends Controller
{
    public function showProductos(){
        return view('reportes.productos.productos');
    }

    public function showProductosReporte(Request $request){
        $reporte = $request->input('formulario');

        switch ($reporte) {
            case 'formulario1':
                $fecha = $request->input('fecha');
                // Validación
                $request->validate([
                    'fecha' => 'required|date',
                ]);

                //Fechas
                $fechaInicio = Carbon::parse($fecha)->startOfDay();
                $fechaFin = Carbon::parse($fechaInicio)->addWeek(1)->endOfDay();

                //Información para el gráfico
                $conProductos = DB::select('select nombre, sum(cantidad) as totalProd from venta
                inner join pedido on venta.idv = pedido.idv
                inner join producto on pedido.idpro = producto.idpro
                where (fechaVent between ? and ?) and
                pedido.status = "Vendido" 
                group by nombre order by totalProd desc;', [$fechaInicio, $fechaFin]);

                $productos = [];
                $cantidad = [];

                foreach (array_slice($conProductos, 0, 3) as $producto) {
                    $productos[] = $producto->nombre;
                    $cantidad[] = $producto->totalProd;
                }

                $jsonData = json_encode([
                    'productos' => $productos,
                    'cantidad' => $cantidad
                ]);

                //Modificar formato de fecha 
                $fechaInicioN = $fechaInicio->format('Y - F - d');
                $fechaFinN = $fechaFin->format('Y - F - d');

                //Devolución de datos
                return redirect()->route('reportes.productos')->with(compact('fechaInicioN', 'fechaFinN', 'jsonData', 'reporte'));

                
                break;

            case 'formulario2':
                break;
        }
    }

    public function generarSemanalPDF(Request $request){
        $fechaInicioN = $request->input('fechaInicioN');
        $fechaFinN = $request->input('fechaFinN');
        $graficoImagenSem = $request->input('graficoImagenSem');

        // Cargar la librería DOMPDF
        $pdf = App::make('dompdf.wrapper');

        // Construir el contenido HTML del PDF
        $html = view('reportes.productos.productos_semanales_pdf', [
            'fechaInicioN' => $fechaInicioN,
            'fechaFinN' => $fechaFinN,
            'graficoImagenSem' => $graficoImagenSem
        ])->render();

        // Cargar el contenido HTML al PDF
        $pdf->loadHTML($html);

        // Descargar el PDF
        return $pdf->download('reporte_productos_semanales.pdf');
    }
}
