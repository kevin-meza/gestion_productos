<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\PokemonService;

class PokemonController extends Controller
{
    //

    public function index(){
        Log::info('welcome');
       return view('Pokemon.welcome');
    }
    public function show($name){
        Log::info('name'.$name);
        dd($name);
    }

    public function connectPokeApi($name){
        $get_info = PokemonService::getPokemon($name);
        // dd($get_info);
        $tipo = $get_info['types'][0]['type']['name'];
        $stats = $get_info['stats']
        return response()->json([
        'nombre' => 'Pikachu',
        'tipo' => $tipo
    ]);
    }
}
