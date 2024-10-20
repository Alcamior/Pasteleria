<form action="{{route('horario.store')}}" method="post">

    @csrf

    <label>Hora de entrada:</label>
    <input type="time" name="horaentrada" value="{{old('horaentrada')}}">
    <br>
    @error('horaentrada')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Hora de salida:</label>
    <input type="time" name="horasalida" value="{{old('horasalida')}}">
    <br>
    @error('horasalida')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Día:</label>
    <select type="text" name="dia">
        <option value="Lunes" {{ old('dia') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
        <option value="Martes" {{ old('dia') == 'Martes' ? 'selected' : '' }}>Martes</option>
        <option value="Miércoles" {{ old('dia') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
        <option value="Jueves" {{ old('dia') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
        <option value="Viernes" {{ old('dia') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
        <option value="Sábado" {{ old('dia') == 'Sábado' ? 'selected' : '' }}>Sábado</option>
        <option value="Domingo" {{ old('dia') == 'Domingo' ? 'selected' : '' }}>Domingo</option>
    </select>
    <br>
    @error('dia')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <button>Enviar</button>
</form>