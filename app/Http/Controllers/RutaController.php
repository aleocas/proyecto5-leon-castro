<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RutaController extends Controller
{

    function saludo (){

        return '¡HOLA!';

    }

    function mostrarJuegos (){

        $juegos = [
            ['id' => 1, 'titulo' => 'Valorant'],
            ['id' => 2, 'titulo' => 'Counter Strike 2'],
            ['id' => 3 , 'titulo' => 'FIFA 25']
        ];

        $html = '<table><tr><th>ID</th><th>Titulo</th></tr>';

        foreach ($juegos as $juego) {
            $html .= "<tr><td>".$juego['id']."</td><td>".$juego['titulo']."</td></tr>";
        }

        $html .= '</table>';

        return $html;
    }

    function mostrarJuegosID (int $id){
        $juegos = [
            ['id' => 1, 'titulo' => 'Valorant'],
            ['id' => 2, 'titulo' => 'Counter Strike 2'],
            ['id' => 3, 'titulo' => 'FIFA 25']
        ];

        $juegoEncontrado = null;
        foreach ($juegos as $juego) {
            if ($juego['id'] == $id) {
                $juegoEncontrado = $juego;
                break;
            }
        }

        if ($juegoEncontrado) {
            return "Juego encontrado: <b>ID:</b> {$juegoEncontrado['id']}, <b>Titulo:</b> {$juegoEncontrado['titulo']}";
        } else {
            return "Juego con ID {$id} no encontrado.";
        }
    }
}
