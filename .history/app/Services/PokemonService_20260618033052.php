<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PokemonService
{
    public static function getPokemon(string $name): array
    {
        $response = Http::get(
            "https://pokeapi.co/api/v2/pokemon/{$name}"
        );

        if (!$response->successful()) {
            return [];
        }

        return $response->json();
    }
      public static function getType(string $name): array
    {
        $response = Http::get(
            "https://pokeapi.co/api/v2/pokemon/{$name}"
        );

        if (!$response->successful()) {
            return [];
        }

        return $response->json();
    }
}
