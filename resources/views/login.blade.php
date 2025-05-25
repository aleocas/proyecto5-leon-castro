@extends('layouts.app')

@section('titulo', 'Iniciar Sesión')

@section('contenido')


<form method="post" action="{{ route('Log-in') }}" class="formulario">
    @csrf
    <h1>Iniciar Sesión</h1>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email">
    </div>

    <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena">
    </div>

    <div class="form-group">
        <label for="recordar"><input type="checkbox" name="recordar"> Recordar credenciales</label>
    </div>

    <p>Si aun no tiene una cuenta, <a href="{{ route('Registro') }}">registrese.</a></p>

    <div class="form-group">
        <input type="submit" value="Iniciar Sesión" class="btn-submit">
    </div>

    @if(session('error'))
        <div class="alert alert-danger contenedor-danger">
            {{ session('error') }}
        </div>
    @endif

</form>

@endsection
