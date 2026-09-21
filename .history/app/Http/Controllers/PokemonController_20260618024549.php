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
    // public function show($name){
    //     Log::info('name'.$name);
    //     dd($name);
    // }

    public function connectPokeApi($name){
        $get_info = PokemonService::getPokemon($name);
        // dd($get_info);
        $tipo = $get_info['types'][0]['type']['name'];
        $stats = $get_info['stats'];
        $height = $get_info['height'] / 10 ;
        $weight = $get_info['weight'] / 10 ;
        $name = $get_info['name'];
        $images = [ $get_info['sprites']['front_default'],$get_info['sprites']['front_shiny']   ];

        $info = [
            'nombre' => $name,
            'tipo' => $tipo,
            'altura' => $height,
            'peso' => $weight,
            'imagenes' => $images

        ];
        return response()->json($info);
    }
}
