@extends('layaout.stencil')

@section('head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
        href="{{ request()->getHost() === 'localhost' ? asset('css/formularios/formularios.css') : secure_asset('css/formularios/formularios.css') }}">
        <link rel="stylesheet"
        href="{{ request()->getHost() === 'localhost' ? asset('css/pedido/pedido.css') : secure_asset('css/pedido/pedido.css') }}">
@endsection

@section('title', 'Consultar pedido')

@section('main')
    <div class="container mt-5">
        <div class="row title">
            <div class="col-sm-1 col-md-2"></div>

            <div class="col-sm-10 col-md-8">
                @if (Auth::guard('cliente')->check())
                    <h6>Hola, {{ Auth::guard('cliente')->user()->nombre }}</h6>
                @elseif (Auth::guard('empleado')->check())
                    <h6>Hola, {{ Auth::guard('empleado')->user()->nombre }}</h6>
                @endif
                <h1>Registro de un nuevo pedido</h1>
            </div>

            <div class="col-sm-1 col-md-2"></div>
        </div>

        <hr>

        <div class="row formulario">
            <div class="col-sm-1 col-md-2"></div>

            <div class="col-sm-10 col-md-8">

                <h3>Datos del pedido</h3>
                <br>

                <label>Producto</label>
                <br>
                <select name="producto" id="producto" class="form-control select2" >
                    <option value="">Selecciona un producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->idpro }}" data-nombre="{{ $producto->nombre }}"
                            data-precio="{{ $producto->precio }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
                <br>
                <br>

                <label>Descripción</label><br>
                <input type="text" id="descripcion" class="form-control" name="descripcion">
                <br>

                <label>Cantidad</label><br>
                <input type="number" id="cantidad" class="form-control" name="cantidad"><br>


                <label for="status">Estado:</label><br>
                <select id="status" name="status">
                    <option value="aprobado">Aprobado</option>
                    <option value="espera">En espera</option>
                </select>
                <br>
                <br>

                <label>Promoción</label><br>
                <select name="promocion " id="promocion" class="form-control select2">
                    <option value="{{}}">Selecciona una promoción</option>
                    @foreach ($promociones as $promocion)
                        <option value="{{ $promocion->idprom }}" data-codigo="{{ $promocion->codigo }}"
                            data-descuento="{{ $promocion->descuento }}">{{ $promocion->descripcion }}</option>
                    @endforeach
                </select>
                <br>
                <br>
            </div>
            
            <div class="col-sm-1 col-md-2"></div>
        </div>
        <br>
        <br>


        <form action="{{ route('pedido.store') }}" method="post" id="formVenta">
            @csrf
            <input type="hidden" id="totalHidden" name="total">
            <input type="hidden" id="productos" name="productos">
            <input type="hidden" id="cli" name="cli">
            <button class="btn-enviar">Enviar</button>
        </form>
    </div>
@endsection


<script>

</script>
