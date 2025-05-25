@extends('layouts.app')

@section('titulo', 'Añadir Videojuegos')

@section('contenido')

<form method="post" action="{{ route('Game') }}" enctype="multipart/form-data" class="formulario">
    @csrf
    <h1>Añadir Videojuego</h1>

    <div class="form-group">
        <label for="name">Título:</label>
        <input type="text" id="name" name="name" placeholder="Título del videojuego" required>
    </div>

    <div class="form-group">
        <label for="development">Desarrollador:</label>
        <input type="text" id="development" name="development" placeholder="Nombre del desarrollador" required>
    </div>

    <div class="form-group">
        <label for="year">Año de lanzamiento:</label>
        <input type="date" id="year" name="year" required>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen del videojuego:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">
    </div>

    <div class="form-group">
        @foreach ($generos as $genero)
            <input type="checkbox" value="{{$genero->id}}" name="generos[]"> {{$genero->nombre}}
        @endforeach
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
