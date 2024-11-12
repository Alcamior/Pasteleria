
<style>
    /* Estilos generales */
    body {
        font-family: Arial, sans-serif;
        margin: 60px;
        color: black;
        font-weight: bold
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .fecha {
        font-size: 14px;
        margin-bottom: 20px;
    }

    /* Estilo de la tabla */
    .tabla table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .tabla th, .tabla td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    .tabla th {
        background-color: #d4b398;
        font-weight: bold;
    }
</style>


    <h3 class="title">Reporte de pedidos próximos a entregar</h3>

    <section class="fecha">
        <p>{{ $hoyN }}</p>
    </section>

    <section class="tabla">
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Descuento</th>
                    <th>Total</th>
                    <th>Fecha de realización de pedido</th>
                    <th>Fecha de entrega</th>
                    <th>Días para entregar</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido['idped'] }}</td>
                        <td>{{ $pedido['nombre'] }}</td>
                        <td>{{ $pedido['descripcion'] }}</td>
                        <td>{{ $pedido['cantidad'] }}</td>
                        <td>{{ $pedido['subtotal'] }}</td>
                        <td>{{ $pedido['descuento'] }}</td>
                        <td>{{ $pedido['totalP'] }}</td>
                        <td>{{ $pedido['fePed'] }}</td>
                        <td>{{ $pedido['fecEntrega'] }}</td>
                        <td>{{ $pedido['DiasFaltantes'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    

