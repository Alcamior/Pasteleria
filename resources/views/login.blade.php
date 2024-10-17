
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{route('validar-sesion')}}" method="post">
    @csrf
    <label></label>
    <input type="text" name="email" id="">
    <input type="password" name="contrasena" id="">
    <button>Enviar</button>
</form>
