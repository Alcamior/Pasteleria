<form action="{{route('actualizar-producto',$producto->idpro)}}" method="post">
    @csrf
    <label>Tipo:</label>
    <input type="text" name="tipo" value="{{$producto->tipo}}">
    <br>
    <label>Descripción:</label>
    <input type="text" name="descripcion" value="{{$producto->descripcion}}">
    <br>
    <label>Precio:</label>
    <input type="text" name="precio" value="{{$producto->precio}}">
    <br>
    <label>Tamaño:</label>
    <input type="text" name="tamano" value="{{$producto->tamano}}">
    <br>
    <label>Fecha de ingreso:</label>
    <input type="date" name="feIngreso" value="{{$producto->feIngreso}}">
    <br>
    <label>Caducidad:</label>
    <input type="date" name="caducidad" value="{{$producto->caducidad}}">
    <br>
    <label>Categoria:</label>
    <input type="text" name="categoria" value="{{$producto->categoria}}">
    <br>
    <button>Enviar</button>
</form>