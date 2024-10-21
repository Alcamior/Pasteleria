<form action="{{route('almacenaje.update',$almacenaje->idalm)}}" method="post">

    @csrf

    @method('put')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre', $almacenaje->nombre) }}">
    <br>
    @error('nombre')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Descripción:</label>
    <input type="text" name="descripcion" value="{{ old('descripcion', $almacenaje->descripcion) }}">
    <br>
    @error('descripcion')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Fecha de ingreso:</label>
    <input type="date" name="fechaIng" value="{{old('fechaIng', $almacenaje->fechaIng) }}">
    <br>
    @error('fechaIng')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Fecha de caducidad:</label>
    <input type="date" name="fechaCad" value="{{old('fechaCad', $almacenaje->fechaCad) }}">
    <br>
    @error('fechaCad')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Cantidad:</label>
    <input type="text" name="cantidad" value="{{old('cantidad', $almacenaje->cantidad) }}">
    <br>
    @error('cantidad')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Categoría:</label>
    <input type="text" name="categoria" value="{{old('categoria', $almacenaje->categoria) }}">
    <br>
    @error('categoria')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>
    
    <button>Enviar</button>
</form>