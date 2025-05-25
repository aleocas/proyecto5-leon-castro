@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')

<div class="contenedor">
    <h1>Bienvenidos a nuestra página principal</h1>
    <p style="text-align:center;">Este es el contenido principal de la página.</p>
</div>

@if(session('error'))
    <div class="alert alert-danger contenedor-danger">
        {{ session('error') }}
    </div>
@endif

@endsection