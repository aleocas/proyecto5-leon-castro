@extends('layouts.app')

@section('titulo', 'Eliminar')

@section('contenido')

<form method="post" action="{{ route('Delete') }}" class="formulario">
    @csrf
    <h1>Borrar Videojuego</h1>
    
    <div class="form-group">
        <label for="game">Selecciona un Videojuego:</label>
        <select name='game'>
            @foreach($videojuegos as $videojuego)
                <option value="{{$videojuego->id}}">ID: {{$videojuego->id}} - Título: {{$videojuego->nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="submit" value="Eliminar" class="btn-submit">
    </div>

    @if(session('error'))
        <div class="alert alert-danger contenedor-danger">
            {{ session('error') }}
        </div>
    @endif

</form>


@endsection
