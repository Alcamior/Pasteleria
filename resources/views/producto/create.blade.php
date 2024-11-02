<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jockey+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/formularios/formularios.css') }}">
    <title>Document</title>
</head>
<body>
    
    <div class="container mt-5">
        <div class="row title">
            <div class="col-sm-1 col-md-2"></div>

            <div class="col-sm-10 col-md-8">
                @if (Auth::guard('cliente')->check())
                    <h6>Hola, {{ Auth::guard('cliente')->user()->nombre }}</h6>
                @elseif (Auth::guard('empleado')->check())
                    <h6>Hola, {{ Auth::guard('empleado')->user()->nombre }}</h6>
                @endif
                <h1>Registro de un nuevo producto</h1>
            </div>

            <div class="col-sm-1 col-md-2"></div>
        </div>
        
        <hr>
        
        <div class="row formulario">
            <div class="col-sm-1 col-md-2"></div>
            
            <div class="col-sm-10 col-md-8">
                <form action="{{route('producto.store')}}" method="post">

                    @csrf

                    <input type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
                    <br>
                    @error('nombre')
                        <span>*{{ $message }}</span>
                    @enderror
                    <br>
                    <br>

                    <div class="contenedor">
                        <label>Tipo:</label>
                        <select type="text" name="tipo">
                            <option value="Pastelería" {{ old('tipo') == 'Pastelería' ? 'selected' : '' }}>Pastelería</option>
                            <option value="Cafetería" {{ old('tipo') == 'Cafetería' ? 'selected' : '' }}>Cafetería</option>
                        </select>
                    </div>
                    <br>
                    @error('tipo')
                        <span>*{{ $message }}</span>
                    @enderror
                    <br>
                    <br>

                    <div class="descripcion">
                        <input type="text" name="descripcion" placeholder="Descripción" value="{{old('descripcion')}}">
                        <br>
                    </div>
                    @error('descripcion')
                        <span>*{{ $message }}</span>
                    @enderror
                    <br>
                    <br>

                    <input type="text" name="precio" placeholder="Precio" value="{{old('precio')}}">
                    <br>
                    @error('precio')
                        <span>*{{ $message }}</span>
                    @enderror
                    <br>
                    <br>

                    <div class="d-flex flex-sm-row flex-column gap-5 mb-5">
                        <button type="submit" class="btn-enviar">Enviar</button>
                        <button type="button" class="btn-regresar" onclick="window.history.back();">Regresar</button>
                    </div>
                </form>
            </div>

            <div class="col-sm-1 col-md-2"></div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>