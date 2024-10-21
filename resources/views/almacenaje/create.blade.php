<form action="{{route('almacenaje.store')}}" method="post">

    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{old('nombre')}}">
    <br>
    @error('nombre')
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

    <label>Fecha de ingreso de producto:</label>
    <input type="date" name="fechaIng" value="{{old('fechaIng')}}">
    <br>
    @error('fechaIng')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Fecha de caducidad de producto:</label>
    <input type="date" name="fechaCad" value="{{old('fechaCad')}}">
    <br>
    @error('fechaCad')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Cantidad:</label>
    <input type="text" name="cantidad" value="{{old('cantidad')}}">
    <br>
    @error('cantidad')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Categoría:</label>
    <input type="text" name="categoria" value="{{old('categoria')}}">
    <br>
    @error('categoria')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <button>Enviar</button>
</form>