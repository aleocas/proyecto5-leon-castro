@extends('layouts.app')

@section('titulo', 'Añadir Genero')

@section('contenido')

<form method="post" action="{{ route('Gender') }}" class="formulario">
    @csrf
    <h1>Añadir Genero</h1>

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
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
