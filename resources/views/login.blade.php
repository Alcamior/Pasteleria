



<form action="{{route('validar-sesion')}}" method="post">
    @csrf
    <input type="text" name="email" id="email">
    <input type="password" name="contrasena" id="contrasena">
    <button>Enviar</button>
</form>
