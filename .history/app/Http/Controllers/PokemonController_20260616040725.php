<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\PokemonService;

class PokemonController extends Controller
{
    //
    public function show($name){
    Log::info('name'.$name);
    dd($name);
    }

    public function connectPokeApi($name){
        $get_info = PokemonService::getPokemon($name);
        dd($get_info);
    }
}
