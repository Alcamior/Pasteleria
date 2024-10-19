<form action="{{route('producto.update',$producto->idpro)}}" method="post">

    @csrf

    @method('put')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
    <br>
    @error('nombre')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Tipo:</label>
    <select type="text" name="tipo">
        <option value="Pastelería" {{old('tipo', $producto->tipo) == 'Pastelería' ? 'selected' : ''}} >Pastelería</option>
        <option value="Cafetería" {{old('tipo', $producto->tipo) == 'Cafetería' ? 'selected' : ''}} >Cafetería</option>
    </select>
    <br>
    @error('tipo')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Descripción:</label>
    <input type="text" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}">
    <br>
    @error('descripcion')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Precio:</label>
    <input type="text" name="precio" value="{{old('precio', $producto->precio) }}">
    <br>
    @error('precio')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>
    
    <button>Enviar</button>
</form>