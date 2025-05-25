@extends('layouts.app')

@section('titulo', 'Perfil')

@section('contenido')

<form method="post" action="{{ route('Mod Perfil') }}" class="formulario" enctype="multipart/form-data">
    @csrf 
    <h1>Tus datos</h1>
    
    <div class="form-group">
        <label for="nombre">Nombre y apellidos:</label>
        <input type="text" name="nombre" value="{{Auth::user()->name}}"> 
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" name="email" value="{{Auth::user()->email}}"> 
    </div>

    <hr>

    <div class="form-group">
        <label style="text-decoration: underline; font-size: 20px;">Cambiar Contraseña</label>
        <label for="contrasena-an">Contraseña antigua:</label>
        <input type="password" name="contrasena-an"> 
        <label for="contrasena-an2">Repetir contraseña antigua:</label>
        <input type="password" name="contrasena-an2"> 
        <label for="contrasena-nu">Nueva contraseña:</label>
        <input type="password" name="contrasena-nu"> 
    </div>

    <hr>

    <div class="form-group">
        <label for="rol">Rol:</label>
        <select name="rol">
            @if (Auth::user()->rol=='administrador')
            <option value="administrador">Administrador</option>
            <option value="cliente">Cliente</option>
            @else
            <option value="cliente">Cliente</option>
            <option value="administrador">Administrador</option>
            @endif
        </select>
    </div>

    <div class="form-group">
        <label for="imagen">Foto de Perfil:</label>
        <input type="file" name="imagen" accept="image/*">
    </div>

    <div class="form-group">
        <button class="btn-danger"><a href="{{ route('Eliminar Perfil') }}" class="a-danger">Borrar Usuario</a></button>
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