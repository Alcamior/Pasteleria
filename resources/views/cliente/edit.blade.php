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
                <h1 style="text-align: center;">Editar información</h1>
            </div>

            <div class="col-sm-1 col-md-2"></div>
        </div>

        <hr>

        <div class="formulario">
            <form action="{{route('cliente.update',$cliente->idcli)}}" method="post">

                @csrf
                @method('put')

                <div class="row datos-personales">
                    <div class="col-sm-1 col-md-2"></div>
                    
                    <div class="col-sm-4 col-md-2">
                        <h6>Datos personales</h6>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label>Nombre:</label>
                        <br>
                        <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}">
                        <br>
                        @error('nombre')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>

                        <label>Apellido paterno:</label>
                        <br>
                        <input type="text" name="ap" value="{{ old('ap', $cliente->ap) }}">
                        <br>
                        @error('ap')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>

                        <label>Apellido materno:</label>
                        <br>
                        <input type="text" name="am" value="{{ old('am', $cliente->am) }}">
                        <br>
                        @error('am')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>

                        <div class="contenedor">
                            <label>Fecha de nacimiento:</label>
                            <br>
                            <input type="date" name="fenac" value="{{ old('fenac', $cliente->fenac) }}">
                        </div>
                        <br>
                        @error('fenac')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>

                        <div class="contenedor">
                            <label>Género:</label>
                            <select type="text" name="genero">
                                <option value="Femenino" {{old('genero', $cliente->genero) == 'Femenino' ? 'selected' : ''}} >Femenino</option>
                                <option value="Masculino" {{old('genero', $cliente->genero) == 'Masculino' ? 'selected' : ''}} >Masculino</option>
                                <option value="Otro" {{old('genero', $cliente->genero) == 'Otro' ? 'selected' : ''}} >Otro</option>
                            </select>
                        </div>
                        <br>
                        @error('genero')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>
                    </div>

                    <div class="col-sm-1 col-md-2"></div>
                </div>

                <hr>

                <div class="row datos-contacto">
                    <div class="col-sm-1 col-md-2"></div>

                    <div class="col-sm-4 col-md-2">
                        <h6>Información de contacto</h6>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <label>Dirección:</label>
                        <br>
                        <input type="text" name="direccion" value="{{ old('direccion', $cliente->direccion) }}">
                        <br>
                        @error('direccion')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>

                        <label>Teléfono:</label>
                        <br>
                        <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}">
                        <br>
                        @error('telefono')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>

                        <label>Email:</label>
                        <br>
                        <input type="text" name="email" value="{{ old('email', $cliente->email) }}">
                        <br>
                        @error('email')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>

                        <label>Contraseña:</label>
                        <br>
                        <input type="password" name="contrasena" value="{{ old('contrasena', $cliente->contrasena) }}">
                        <br>
                        @error('contrasena')
                            <span>*{{ $message }}</span>
                        @enderror
                        <br>
                        <br>
                    </div>

                    <div class="col-sm-1 col-md-2"></div>
                </div>

                <br>
                <br>
                <br>

                <div class="d-flex flex-sm-row flex-column gap-5 mb-5 justify-content-center">
                    <button type="submit" class="btn-enviar">Enviar</button>
                    <button type="button" class="btn-regresar" onclick="window.history.back();">Regresar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>