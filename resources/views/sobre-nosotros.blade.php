@extends('layouts.app')

@section('titulo', 'About Us')

@section('contenido')

<div class="contenedor">
    <h1 style="text-align: center;">Sobre nosotros</h1>
    <p style="text-align: center;">Datos del usuario que realiza la tarea</p>

    <p style="text-align: center;"><strong>Nombre: </strong>{{$tarea['nombre']}}</p>
    <p style="text-align: center;"><strong>Primer apellido: </strong>{{$tarea['apellido1']}}</p>
    <p style="text-align: center;"><strong>Segundo apellido: </strong>{{$tarea['apellido2']}}</p>
</div>

@endsection