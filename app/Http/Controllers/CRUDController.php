<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Videojuego;

class CRUDController extends Controller
{
    public function formEditar() {

        $videojuegos = Videojuego::all();
        return view('editar', ['videojuegos' => $videojuegos]);

    }

    public function segFormEditar(Request $request) {

        $id = $request->input('game'); // game es el name del select
        $videojuego = Videojuego::find($id);
        $generos = Genero::all();
        return view('editarJuego', ['videojuego' => $videojuego, 'generos' => $generos]);
    }

    public function editar(Request $request) {

        //$id = $request->input('id');
        $validarId = $request->validate([
            'id' => 'required|integer'
        ]);
        $videojuego = Videojuego::find($validarId['id']);

        $validate = $request->validate([
            'title' => 'required|string|max:100',
            'development' => 'required|string|max:50',
            'year' => 'required|date|before_or_equal:today'
        ]);
        
        if ($validate){
            $videojuego->nombre = $validate['title'];
            $videojuego->desarrollador = $validate['development'];
            $videojuego->anio_lanzamiento = $validate['year'];
    
            $videojuego->save();
    
            $generosSeleccionados = $request->input('generos', []);
            $videojuego->generos()->sync($generosSeleccionados);
    
            return redirect()->route('Generos');
        }else{
            return back()->with('error', 'Introduzca bien los campos');
        }

    }

    public function formEliminar() {

        if (!Auth::check()) {
            return redirect()->route('Log-in')->with('error', 'Debe iniciar sesión y ser administrador para eliminar un juego.');
        }
    
        if (Auth::user()->rol !== 'administrador') {
            return redirect()->route('Inicio')->with('error', 'No tienes permisos para eliminar un juego.');
        }

        
        $videojuegos = Videojuego::all();
        return view('eliminar', ['videojuegos' => $videojuegos]);

    }

    public function eliminarJuego(Request $request) {

        $validarId = $request->validate([
            'game' => 'required|integer'
        ]);
        $videojuego = Videojuego::find($validarId['game']);

        /*En vez de poner en la tabla del migrations onDeleteCascade se puede hacer tambien esto
            $videojuego->generos()->detach();
        */

        $videojuego->delete();

        return redirect()->route('Ver');
    }

    public function vistaIniciar (){

        return view('login');

    }

    public function iniciarSesion (Request $request){
        
        $validate = $request->validate([
            'email' => 'required|string|max:150',
            'contrasena' => 'required|string|min:8|max:32'
        ]);

        if ($validate){
            
            $credenciales = [
                'email' => $validate['email'],
                'password' => $validate['contrasena'],
            ];

            $recordar = ($request->has('recordar') ? true : false);

            if (Auth::attempt($credenciales, $recordar)){
                $request->session()->regenerate();

                return redirect()->intended(route('Inicio'));
            }else{
                return redirect()->route('Log-in');
            }

        }else{
            return back()->with('error', 'Introduzca bien los campos.');
        }

    }

    public function vistaRegistrar (){

        return view('registro');

    }
    
    public function registrarUsuario (Request $request){
        
        $usuario = new User();

        $validate = $request->validate([
            'nombre' => 'required|string|max:150',
            'email' => 'required|string|max:150',
            'contrasena' => 'required|string|min:8|max:32',
            'rol' => 'required',
        ]);

        if ($validate){
            $usuario->name = $validate['nombre'];
            $usuario->email = $validate['email'];
            $usuario->password = Hash::make($validate['contrasena']);
            $usuario->rol = $validate['rol'];
    
            $usuario->save();
    
            Auth::login($usuario);
    
            return redirect(route('Inicio'));
        }else{
            return back()->with('error', 'Introduzca bien los campos.');
        }

    }

    public function cerrarSesion (Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('Log-in'));

    }
}
