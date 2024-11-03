@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jockey+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reportes/ventas.css') }}">
@endsection

@section('main')
    @if ($reporte == 'formulario1')
    <h3>Reporte diario de ventas</h3>
    <p>Fecha: {{ $fechaN }}</p>

    <div class="ganancias">
        <p>Ganancias Pastelería: ${{ $totalPP[0]->totalPas }}</p>
        <p>Ganancias Cafetería: ${{ $totalPC[0]->totalCaf }}</p>
        <p>Ganancias Totales: ${{ $total }}</p>
    </div>

    <table class="tabla">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->nombre }}</td>
                    <td>{{ $venta->cantidad }}</td>
                    <td>${{ $venta->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @elseif ($reporte == 'formulario2')
        <h3>Reporte semanal de ventas</h3>
        <p>Desde: {{ $fechaInicioN }} hasta {{ $fechaFinN }}</p>

        <div class="ganancias">
            <p>Ganancias Pastelería: ${{ $totalPP[0]->totalPas }}</p>
            <p>Ganancias Cafetería: ${{ $totalPC[0]->totalCaf }}</p>
            <p>Ganancias Totales: ${{ $total }}</p>
        </div>
    @endif
@endsection