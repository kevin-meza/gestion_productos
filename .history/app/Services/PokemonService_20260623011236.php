<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
    public static function getType($url)
    {
        $response = Http::get(
            $url
        );

        if (!$response->successful()) {
            return [];
        }

        Log::info($response);

        return $response->json();
    }

       public static function getDescription(string $name): array
    {
        $response = Http::get(
            "https://pokeapi.co/api/v2/pokemon-species/{$name}"
        );

        $descriptions = $response['flavor_text_entries'];

        foreach($descriptions as  $description ){

             $descripcionesES = collect($description)
                ->filter(function ($item) {
                    return $item['language']['name'] === 'es';
                })
                ->map(function ($item) {
                    return str_replace(["\n", "\f"], ' ', $item['flavor_text']);
                })
                ->values();

            Log::info($descripcionesES);

        }

        if (!$response->successful()) {
            return [];
        }

        return $response->json();
    }

}
