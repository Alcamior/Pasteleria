@extends('layaout/stencil')


@section('title', 'Dashboard base de datos')

@section('main')

    <form action="{{route('exportar.database')}}" method="get"> 
        <button>
            Exportar la base de datos
        </button>
    </form>
    <br>
    <br>


    <form action="{{ route('database.restore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="backup_file" required>
        <button type="submit">Restaurar Base de Datos</button>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </form>

@endsection