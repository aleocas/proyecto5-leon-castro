@extends('layouts.app')

@section('titulo', 'Géneros')

@section('contenido')

@if (count($videojuegoGeneros) > 0 && count($generoVideojuegos) > 0)

    <table class="videojuegos-tabla">
        <thead>
            <tr>
                <th>Título</th>
                <th>Desarrollador</th>
                <th>Géneros</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($videojuegoGeneros); $i++)
                <tr>
                    @for ($j = 0; $j < 3; $j++)
                        <td>{{ $videojuegoGeneros[$i][$j] }}</td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>

    <table class="videojuegos-tabla">
        <thead>
            <tr>
                <th>Género</th>
                <th>Juegos</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($generoVideojuegos); $i++)
                <tr>
                    @for ($j = 0; $j < 2; $j++)
                        <td>{{ $generoVideojuegos[$i][$j] }}</td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>

@endif

@endsection
