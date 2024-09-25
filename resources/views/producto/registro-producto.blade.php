<form action="{{route('validar-producto')}}" method="post">
    @csrf
    <label>Tipo:</label>
    <input type="text" name="tipo" >
    <br>
    <label>Descripción:</label>
    <input type="text" name="descripcion">
    <br>
    <label>Precio:</label>
    <input type="text" name="precio">
    <br>
    <label>Tamaño:</label>
    <input type="text" name="tamano">
    <br>
    <label>Fecha de ingreso:</label>
    <input type="date" name="feIngreso">
    <br>
    <label>Caducidad:</label>
    <input type="date" name="caducidad">
    <br>
    <label>Categoria:</label>
    <input type="text" name="categoria">
    <br>
    <button>Enviar</button>
</form>