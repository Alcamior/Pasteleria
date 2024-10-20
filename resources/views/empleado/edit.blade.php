<form action="{{route('empleado.update',$empleado->ide)}}" method="post">

    @csrf

    @method('put')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre', $empleado->nombre) }}">
    <br>
    @error('nombre')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Apellido paterno:</label>
    <input type="text" name="ap" value="{{ old('ap', $empleado->ap) }}">
    <br>
    @error('ap')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Apellido materno:</label>
    <input type="text" name="am" value="{{ old('am', $empleado->am) }}">
    <br>
    @error('am')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Género:</label>
    <select type="text" name="genero">
        <option value="Femenino" {{old('genero', $empleado->genero) == 'Femenino' ? 'selected' : ''}} >Femenino</option>
        <option value="Masculino" {{old('genero', $empleado->genero) == 'Masculino' ? 'selected' : ''}} >Masculino</option>
        <option value="Otro" {{old('genero', $empleado->genero) == 'Otro' ? 'selected' : ''}} >Otro</option>
    </select>
    <br>
    @error('genero')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Fecha de nacimiento:</label>
    <input type="date" name="fenac" value="{{ old('fenac', $empleado->fenac) }}">
    <br>
    @error('fenac')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Fecha de ingreso:</label>
    <input type="date" name="feIng" value="{{ old('feIng', $empleado->feIng) }}">
    <br>
    @error('feIng')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Dirección:</label>
    <input type="text" name="direccion" value="{{ old('direccion', $empleado->direccion) }}">
    <br>
    @error('direccion')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="{{ old('telefono', $empleado->telefono) }}">
    <br>
    @error('telefono')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Email:</label>
    <input type="text" name="email" value="{{ old('email', $empleado->email) }}">
    <br>
    @error('email')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Contraseña:</label>
    <input type="password" name="contrasena" value="{{ old('contrasena', $empleado->contrasena) }}">
    <br>
    @error('contrasena')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    
    
    <button>Enviar</button>
</form>