<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PerfilController extends Controller
{

    public function vistaPerfil() {

        return view('editarPerfil');

    }

    public function modificarPerfil(Request $request)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:150',
            'email' => 'required|string|max:150',
            'contrasena-an' => 'nullable|string|min:8|max:32',
            'contrasena-an2' => 'nullable|string|min:8|max:32',
            'contrasena-nu' => 'nullable|string|min:8|max:32',
            'rol' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validate){
            /** @var \App\Models\User $usuario */
            $usuario = Auth::user();
                
            $usuario->name = $validate['nombre'];
            $usuario->email = $validate['email'];
            $usuario->rol = $validate['rol'];
            
            if ($request->hasFile('imagen')) {

                if ($usuario->imagen && $usuario->imagen !== 'perfiles/icono-usuario.png') {
                    Storage::disk('public')->delete($usuario->imagen); 
                }
            
                $imagen = $request->file('imagen');
                $rutaImagen = $imagen->store('perfiles', 'public');
                $usuario->imagen = $rutaImagen;
            }

            if (!empty($validate['contrasena-nu'])) {
                
                if (empty($validate['contrasena-an']) || empty($validate['contrasena-an2'])) {
                    return back()->with('error', 'Debe completar los campos de la contraseña antigua.');
                }

                if (!Hash::check($validate['contrasena-an'], $usuario->password)) {
                    return back()->with('error', 'La contraseña actual no es correcta.');
                }

                if ($validate['contrasena-an'] !== $validate['contrasena-an2']) {
                    return back()->with('error', 'Las contraseñas actuales no coinciden.');
                }

                $usuario->password = Hash::make($validate['contrasena-nu']);
            }

            $usuario->save();

            return redirect()->route('Inicio'); 
        }else{
            return back()->with('error', 'Introduzca bien los campos que quiera modificar.');
        }
        
    }
    
    public function vistaEliminarUsuario()
    {

        return view('eliminarUsuario');

    }

    public function eliminarUsuario(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required|string|max:150',
            'contrasena' => 'required|string|min:8|max:32',
            'contrasena2' => 'required|string|min:8|max:32',
            'eliminar' => 'required',
        ]);

        if ($validate){
            /** @var \App\Models\User $usuario */
            $usuario = Auth::user();

            if (($usuario->email === $validate['email']) && ($validate['contrasena'] === $validate['contrasena2'])){
                if (Hash::check($validate['contrasena'], $usuario->password)) {
                    Auth::logout();

                    $usuario->delete();
        
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
        
                    return redirect()->route('Inicio');
                }else{
                    return back()->with('error', 'La contraseña no coincide con la original.');
                }
            }else{
                return back()->with('error', 'Las credenciales no son correctas.');
            }

        }else{
            return back()->with('error', 'Debe introducir credenciales validas con los requisitos.');
        }

    }

}
