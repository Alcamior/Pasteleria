<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReporteCaducadoController extends Controller
{
    public function showCaducados(){
        $caducados = DB::select('select *, datediff(fechaCad,curdate()) as dias 
        from almacenaje where (fechaCad = curdate() 
        or fechaCad = adddate(curdate() , interval 1 day)) 
        and categoria = "Comida";');

        $hoy = new \DateTime();
        $hoyN = $hoy->format('Y - F - d');

        return view('reportes.caducados.caducados', compact('caducados', 'hoyN'));
    }

    public function generarCaducadosPDF(Request $request){
        $caducados = json_decode($request->input('caducados'), true);
        $hoyN = $request->input('hoyN');

        // Cargar la librería DOMPDF
        $pdf = App::make('dompdf.wrapper');

        // Construir el contenido HTML del PDF
        $html = view('reportes.caducados.caducados_pdf', [
            'caducados' => $caducados,
            'hoyN' => $hoyN
        ])->render();

        // Cargar el contenido HTML al PDF
        $pdf->loadHTML($html);

        // Descargar el PDF
        return $pdf->download('reporte_proximos_caducar.pdf');
    }
}
