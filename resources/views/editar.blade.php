@extends('layouts.app')

@section('titulo', 'Editar')

@section('contenido')

<form method="get" action="{{ route('Enviar') }}" class="formulario">
    @csrf
    <h1>Elegir Videojuego</h1>
    
    <div class="form-group">
        <label for="game">Selecciona un Videojuego:</label>
        <select name='game'>
            @foreach($videojuegos as $videojuego)
                <option value="{{$videojuego->id}}">ID: {{$videojuego->id}} - Título: {{$videojuego->nombre}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="submit" value="Editar" class="btn-submit">
    </div>
    
    @if(session('error'))
        <div class="alert alert-danger contenedor-danger">
            {{ session('error') }}
        </div>
    @endif
</form>

@endsection