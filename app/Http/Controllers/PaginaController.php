<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function inicio (){

        return view('inicio');

    }

    public function about (){

        $tarea = [
            'nombre' => 'Alejandro',
            'apellido1' => 'León',
            'apellido2' => 'Castro'
        ];

        return view('sobre-nosotros', ['tarea' => $tarea]);

    }
}
