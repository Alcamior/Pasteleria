<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>Document</title>
</head>
<body>

    @auth
    {{ 'Autenticado' }}
@else
    {{ 'No autenticado' }}
@endauth
{{--     @if(session('user'))
    {{ dd(session('user')) }} <!-- Muestra el objeto del usuario autenticado -->
@endif --}}




    <div>
        <p><button id="eliminarDato">Eliminar fila seleccionada</button></p>
        <p><button id="actualizarDato">Actualizar fila seleccionada</button></p>
        <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Appelido paterno</th>
                    <th>Appelido materno</th>
                    <th>Género</th>
                    <th>Dirección</th>
                    <th>Fecha de nacimiento</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cliente as $clientes)
                <tr>
                    <td>{{$clientes->idcli}}</td>
                    <td>{{$clientes->nombre}}</td>
                    <td>{{$clientes->ap}}</td>
                    <td>{{$clientes->am}}</td>
                    <td>{{$clientes->genero}}</td>
                    <td>{{$clientes->direccion}}</td>
                    <td>{{$clientes->fenac}}</td>
                    <td>{{$clientes->telefono}}</td>
                    <td>{{$clientes->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Cargar jQuery antes de DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Cargar DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- JS de DataTables y extensiones de botones -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <!-- Cargar el archivo producto.js -->
    {{-- <script type="text/javascript" src="js/producto/producto.js?v=1.0.1"></script> --}}
    <script src="{{ asset('js/cliente/cliente.js?v=1.0.1') }}"></script>
    
</body>
</html>
