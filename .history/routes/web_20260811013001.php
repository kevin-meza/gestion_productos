<?php

use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PersonaController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('home.home');
});

//personas
// Route::get('/personas', [PersonaController::class, 'index']);
// Route::get('/personas/registrar', [PersonaController::class, 'create']);

Route::get('/personas/listar',[PersonaController::class,'listarPersonas']);
// Route::delete('/personas/{persona}', [PersonaController::class, 'destroy']);
Route::resource('/personas',\App\Http\Controllers\PersonaController::class);

Route::resource('/productos',\App\Http\Controllers\ProductosController::class);

Route::resource('/pokemon',\App\Http\Controllers\PokemonController::class);

Route::get('/pokemon/get-info/{name}', [PokemonController::class, 'connectPokeApi']);
