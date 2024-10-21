<form action="{{route('promocion.store')}}" method="post">

    @csrf

    <label>Código:</label>
    <input type="text" name="codigo" value="{{old('codigo')}}">
    <br>
    @error('codigo')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Descuento:</label>
    <input type="text" name="descuento" value="{{old('descuento')}}">
    <br>
    @error('descuento')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Días:</label>
    <input type="text" name="dias" value="{{old('dias')}}">
    <br>
    @error('dias')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Descripción:</label>
    <input type="text" name="descripcion" value="{{old('descripcion')}}">
    <br>
    @error('descripcion')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Estatus:</label>
    <select type="text" name="estatus">
        <option value="Activa" {{ old('estatus') == 'Activa' ? 'selected' : '' }}>Activa</option>
        <option value="Inactiva" {{ old('estatus') == 'Inactiva' ? 'selected' : '' }}>Inactiva</option>
    </select>
    <br>
    @error('estatus')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>


    <button>Enviar</button>
</form>