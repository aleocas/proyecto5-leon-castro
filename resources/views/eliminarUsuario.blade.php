@extends('layouts.app')

@section('titulo', 'Eliminar Usuario')

@section('contenido')


<form method="post" action="{{ route('Borrar Perfil') }}" class="formulario">
    @csrf 
    <h1>Eliminar Usuario</h1>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" value="{{Auth::user()->email}}"> 
    </div>

    <div class="form-group">
        <label for="contrasena-an">Contraseña:</label>
        <input type="password" name="contrasena"> 
        <label for="contrasena-an2">Confirmar contraseña</label>
        <input type="password" name="contrasena2"> 
    </div>

    <div class="form-group">
        <label><input type="checkbox" value="borrar" class="btn-submit" name="eliminar"> ¿Seguro que desea eliminar su cuenta?</label>
    </div>

    <div class="form-group">
        <input type="submit" value="Borrar Cuenta" class="btn-submit">
    </div>

    @if(session('error'))
        <div class="alert alert-danger contenedor-danger">
            {{ session('error') }}
        </div>
    @endif

</form>

@endsection