<form action="{{route('cliente.update',$cliente->idcli)}}" method="post">

    @csrf

    @method('put')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre', $cliente->nombre) }}">
    <br>
    @error('nombre')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Apellido paterno:</label>
    <input type="text" name="ap" value="{{ old('ap', $cliente->ap) }}">
    <br>
    @error('ap')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Apellido materno:</label>
    <input type="text" name="am" value="{{ old('am', $cliente->am) }}">
    <br>
    @error('am')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Género:</label>
    <select type="text" name="genero">
        <option value="Femenino" {{old('genero', $cliente->genero) == 'Femenino' ? 'selected' : ''}} >Femenino</option>
        <option value="Masculino" {{old('genero', $cliente->genero) == 'Masculino' ? 'selected' : ''}} >Masculino</option>
        <option value="Otro" {{old('genero', $cliente->genero) == 'Otro' ? 'selected' : ''}} >Otro</option>
    </select>
    <br>
    @error('genero')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Dirección:</label>
    <input type="text" name="direccion" value="{{ old('direccion', $cliente->direccion) }}">
    <br>
    @error('direccion')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Fecha de nacimiento:</label>
    <input type="date" name="fenac" value="{{ old('fenac', $cliente->fenac) }}">
    <br>
    @error('fenac')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="{{ old('telefono', $cliente->telefono) }}">
    <br>
    @error('telefono')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Email:</label>
    <input type="text" name="email" value="{{ old('email', $cliente->email) }}">
    <br>
    @error('email')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Contraseña:</label>
    <input type="password" name="contrasena" value="{{ old('contrasena', $cliente->contrasena) }}">
    <br>
    @error('contrasena')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    
    
    <button>Enviar</button>
</form>