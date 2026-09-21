<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use app\Services\PokemonService;

class PokemonController extends Controller
{
    //
    public function show($name){
    Log::info('name'.$name);
    dd($name);
    }
}
