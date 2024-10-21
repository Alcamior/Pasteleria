<form action="{{route('promocion.update',$promocion->idprom)}}" method="post">

    @csrf

    @method('put')

    <label>Código:</label>
    <input type="text" name="codigo" value="{{ old('codigo', $promocion->codigo) }}">
    <br>
    @error('codigo')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Descuento:</label>
    <input type="text" name="descuento" value="{{ old('descuento', $promocion->descuento) }}">
    <br>
    @error('descuento')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Días:</label>
    <input type="text" name="dias" value="{{old('dias', $promocion->dias) }}">
    <br>
    @error('dias')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Descripción:</label>
    <input type="text" name="descripcion" value="{{old('descripcion', $promocion->descripcion) }}">
    <br>
    @error('descripcion')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Estatus:</label>
    <select type="text" name="estatus">
        <option value="Activa" {{old('estatus', $promocion->estatus) == 'Activa' ? 'selected' : ''}} >Activa</option>
        <option value="Inactiva" {{old('estatus', $promocion->estatus) == 'Inactiva' ? 'selected' : ''}} >Inactiva</option>
    </select>
    <br>
    @error('estatus')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>
    
    <button>Enviar</button>
</form>