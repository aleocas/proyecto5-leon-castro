<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\BBDDController;
use App\Http\Controllers\EloquentController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\PerfilController;

Route::get('/hola', [RutaController::class, 'saludo']);
Route::get('/juegos', [RutaController::class, 'mostrarJuegos']);
Route::get('/juegos/{id}', [RutaController::class, 'mostrarJuegosID']);

/*------------------------------------------------------------*/

Route::get('/', [PaginaController::class, 'inicio'])
->name('Inicio');
Route::get('/sobre-nosotros', [PaginaController::class, 'about'])
->name('About Us');

/*------------------------------------------------------------*/

Route::get('/catalogo', [BBDDController::class, 'verJuegos'])
-> name('Ver');

Route::get('/anadir', [BBDDController::class, 'elegirInsertar'])
-> name('Elegir');
Route::post('/anadir', [BBDDController::class, 'devolverInsertar'])
-> name('Choose');

Route::post('/insertarJuego', [BBDDController::class, 'insertarJuego'])
-> name('Game');

Route::post('/insertarGenero', [BBDDController::class, 'insertarGenero'])
-> name('Gender');

/*------------------------------------------------------------*/

Route::get('/generos', [EloquentController::class, 'genreTables'])
-> name('Generos');

//comentario para 
/*------------------------------------------------------------*/

Route::get('/modificar', [CRUDController::class, 'formEditar'])
-> name('Editar');
Route::get('/editar', [CRUDController::class, 'segFormEditar'])
-> name('Enviar');
Route::post('/editar', [CRUDController::class, 'editar'])
-> name('Update');

Route::get('/eliminar', [CRUDController::class, 'formEliminar'])
-> name('Eliminar');
Route::post('/eliminar', [CRUDController::class, 'eliminarJuego'])
-> name('Delete');

/*------------------------------------------------------------*/

Route::get('/registrarse', [CRUDController::class, 'vistaRegistrar'])
-> name('Registro');
Route::post('/registrarse', [CRUDController::class, 'registrarUsuario'])
-> name('Registrar');
Route::get('/iniciar-sesion', [CRUDController::class, 'vistaIniciar'])
-> name('Iniciar Sesion');
Route::post('/iniciar-sesion', [CRUDController::class, 'iniciarSesion'])
-> name('Log-in');
Route::get('/cerrar-sesion', [CRUDController::class, 'cerrarSesion'])
-> name('Log-out');

/*------------------------------------------------------------*/

Route::get('/perfil', [PerfilController::class, 'vistaPerfil'])
-> name('Perfil');
Route::post('/perfil', [PerfilController::class, 'modificarPerfil'])
-> name('Mod Perfil');
Route::get('/borrarperfil', [PerfilController::class, 'vistaEliminarUsuario'])
-> name('Eliminar Perfil');
Route::post('/borrarperfil', [PerfilController::class, 'eliminarUsuario'])
-> name('Borrar Perfil');