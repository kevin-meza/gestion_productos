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

    public static function getDescription(string $name)
    {
        $response = Http::get(
            "https://pokeapi.co/api/v2/pokemon-species/{$name}"
        );

        $data = $response->json();

        $entries = $data['flavor_text_entries'];

        $descripcionesES = collect($entries)
            ->filter(function ($item) {
                return $item['language']['name'] === 'es';
            })
            ->map(function ($item) {
                return str_replace(["\n", "\f"], ' ', $item['flavor_text']);
            })
            ->values();

        // Log::info("descripcionesES");
        //        Log::info($descripcionesES);
        $texto = '';
        if ($descripcionesES) {
            foreach($descripcionesES as $description){
                $texto = $texto.$description;
            }
        }

        if (!$response->successful() && $texto != null) {
            return [];
        }

        return $texto;
    }

}
