<?php
namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class EloquentController extends Controller
{
    public function genreTables() {

        // $videogenres = Videojuego::with('generos')->get();
        // $genrevideos = Genero::with('videojuegos')->get();

        $videogenres = [];
        $genrevideos = [];

        $videojuegos = Videojuego::all();
        $generos = Genero::all();

        foreach ($videojuegos as $videojuego) {
            $genres = '';
            foreach ($videojuego->generos as $genero) { //$videojuego->generos ese generos se refiere al metodo que esta en el modelo Videojuego, que tiene una funcion generos();
                $genres .= $genero->nombre . ', ';
            }
            $genres = rtrim($genres, ', ');
            $conjunto = [$videojuego->nombre, $videojuego->desarrollador, $genres];
            $videogenres[] = $conjunto;
        }

        foreach ($generos as $genero) {
            $games = '';
            foreach ($genero->videojuegos as $videojuego) { //$genero->videojuegos ese videojuegos se refiere al metodo que esta en el modelo Genero, que tiene una funcion videojuegos();
                $games .= $videojuego->nombre . ', ';
            }
            $games = rtrim($games, ', ');
            $conjunto2 = [$genero->nombre, $games];
            $genrevideos[] = $conjunto2;
        }

        return view('generos', ['videojuegoGeneros' => $videogenres,'generoVideojuegos' => $genrevideos]);
    }
}
