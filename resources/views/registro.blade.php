@extends('layouts.app')

@section('titulo', 'Registro')

@section('contenido')


<form method="post" action="{{ route('Registrar') }}" class="formulario">
    @csrf
    <h1>Registrarse</h1>

    <div class="form-group">
        <label for="nombre">Nombre y Apellidos</label>
        <input type="text" name="nombre">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email">
    </div>

    <div class="form-group">
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena">
    </div>

    <div class="form-group">
        <label for="rol">¿Cuál será su rol?</label>
        <select name="rol">
            <option value="cliente">Cliente</option>
            <option value="administrador">Administrador</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" value="Registrarse" class="btn-submit">
    </div>

    @if(session('error'))
        <div class="alert alert-danger contenedor-danger">
            {{ session('error') }}
        </div>
    @endif
    
</form>

@endsection
