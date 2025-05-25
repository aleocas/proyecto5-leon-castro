<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Videojuego;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BBDDController extends Controller
{

    public function verJuegos (){

        $datos = DB::table('videojuegos')->get();

        return view('ver', ['videojuegos' => $datos]);

    }

    public function elegirInsertar (){

        return view('elegir');

    }

    public function devolverInsertar(Request $request){
        
        $vista = $request->input('insertar');

        if ($vista == 'videojuego'){
            $generos = Genero::all();
            return view('insertarJuego', ['generos' => $generos]);
        }elseif ($vista == 'genero'){
            return view('insertarGenero');
        }

    }

    public function insertarJuego(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'development' => 'required|string|max:255',
            'year' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'generos' => 'nullable|array'
        ]);

        $rutaImagen = null;

        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('videojuegos', 'public');
        }

        $videojuegoId = DB::table('videojuegos')->insertGetId([
            'nombre' => $request->input('name'),
            'desarrollador' => $request->input('development'),
            'anio_lanzamiento' => $request->input('year'),
            'imagen' => $rutaImagen,
        ]);

        $videojuego = Videojuego::find($videojuegoId);

        if ($request->has('generos')) {
            $videojuego->generos()->attach($request->input('generos'));
        }

        return redirect()->route('Ver');
    }


    public function insertarGenero (Request $request){

        $genero = new Genero();
        $genero->nombre = $request->input('name');
        $genero->save();

        return redirect()->route('Generos');

    }
}
