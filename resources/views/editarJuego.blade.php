@extends('layouts.app')

@section('titulo', 'Editar')

@section('contenido')

<form method="post" action="{{ route('Update') }}" class="formulario">
    @csrf
    <h1>Editar Videojuego</h1>

    <input type="hidden" name="id" value="{{ $videojuego->id }}">   
    
    <div class="form-group">
        <label for="title">Título:</label>
        <input type="text" name="title" value="{{$videojuego->nombre}}"> 
    </div>

    <div class="form-group">
        <label for="title">Desarrollador:</label>
        <input type="text" name="development" value="{{$videojuego->desarrollador}}"> 
    </div>

    <div class="form-group">
        <label for="title">Fecha de lanzamiento:</label>
        <input type="date" name="year" value="{{$videojuego->anio_lanzamiento}}"> 
    </div>

    <div class="form-group">
        @foreach ($generos as $genero)

            @php $checked = false; @endphp

            @foreach ($videojuego->generos as $genre)
                @if ($genero->id === $genre->id)
                    @php $checked = true; @endphp
                    @break
                @endif
            @endforeach

                @if ($checked)
                    <input type="checkbox" value="{{$genero->id}}" name="generos[]" checked>{{$genero->nombre}}
                @else
                    <input type="checkbox" value="{{$genero->id}}" name="generos[]">{{$genero->nombre}}
                @endif
                
        @endforeach
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