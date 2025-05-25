@extends('layouts.app')

@section('titulo', 'Ver Videojuegos')

@section('contenido')

<div class="contenedor">
    <h1>Videojuegos</h1>

    @if (count($videojuegos) > 0)

        <div class="videojuegos-grid">
            @foreach ($videojuegos as $videojuego)
                <div class="card">
                    <img src="{{ asset('storage/' . $videojuego->imagen) }}" alt="Imagen de {{ $videojuego->nombre }}" class="videojuego-imagen"><br>
                    <h2>{{ $videojuego->nombre }}</h2>
                    <p><strong>Desarrollador:</strong> {{ $videojuego->desarrollador }}</p>
                    <p><strong>Año de lanzamiento:</strong> {{ $videojuego->anio_lanzamiento }}</p>
                </div>
            @endforeach
        </div>

    @else
        <p>¡No hay videojuegos añadidos actualmente!</p>
    @endif
</div>

@endsection
