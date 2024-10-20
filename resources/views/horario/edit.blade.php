<form action="{{route('horario.update',$horario->idh)}}" method="post">

    @csrf

    @method('put')

    <label>Hora de entrada:</label>
    <input type="time" name="horaentrada" value="{{ old('horaentrada', $horario->horaentrada) }}">
    <br>
    @error('horaentrada')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Hora de salida:</label>
    <input type="time" name="horasalida" value="{{ old('horasalida', $horario->horasalida) }}">
    <br>
    @error('horasalida')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>

    <label>Día:</label>
    <select type="text" name="dia">
        <option value="Lunes" {{old('dia', $horario->dia) == 'Lunes' ? 'selected' : ''}} >Lunes</option>
        <option value="Martes" {{old('dia', $horario->dia) == 'Martes' ? 'selected' : ''}} >Martes</option>
        <option value="Miércoles" {{old('dia', $horario->dia) == 'Miércoles' ? 'selected' : ''}} >Miércoles</option>
        <option value="Jueves" {{old('dia', $horario->dia) == 'Jueves' ? 'selected' : ''}} >Jueves</option>
        <option value="Viernes" {{old('dia', $horario->dia) == 'Viernes' ? 'selected' : ''}} >Viernes</option>
        <option value="Sábado" {{old('dia', $horario->dia) == 'Sábado' ? 'selected' : ''}} >Sábado</option>
        <option value="Domingo" {{old('dia', $horario->dia) == 'Domingo' ? 'selected' : ''}} >Domingo</option>
    </select>
    <br>
    @error('dia')
        <span>*{{ $message }}</span>
    @enderror
    <br>
    <br>
    
    <button>Enviar</button>
</form>