@extends('layouts.app')

@section('titulo', 'Insertar')

@section('contenido')

<form method="post" action="{{ route('Choose') }}" class="formulario">
    @csrf
    <h1>Elija que desea insertar</h1>

    <div class="form-group">
        <label for="insertar">¿Qué quieres insertar?:</label>
        <select name="insertar">
            <option value="videojuego">Videojuego</option>
            <option value="genero">Género</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" value="Agregar" class="btn-submit">
    </div>

    @if(session('error'))
        <div class="alert alert-danger contenedor-danger">
            {{ session('error') }}
        </div>
    @endif

</form>

@endsection
