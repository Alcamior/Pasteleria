


<form action="{{route('validar-registro')}}" method="post">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre">
    <br>
    <label>Apellido paterno:</label>
    <input type="text" name="ap">
    <br>
    <label>Apellido materno:</label>
    <input type="text" name="am">
    <br>
    <label>Telefono</label>
    <input type="text" name="telefono">
    <br>
    <label>Email</label>
    <input type="text" name="email">
    <br>
    <label>Contraseña</label>
    <input type="password" name="contrasena" >
    <br>
    <button>Enviar</button>
    
</form>