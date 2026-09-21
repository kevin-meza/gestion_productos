<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>|
        </style>
    </head>
    <body class="antialiased">
 {{-- <div id="app"></div> --}}
        <h1>titulo</h1>
                <h1 class="text-primary">Pokédex</h1>
    <div id="app">
        <ApiPokemon></ApiPokemon>
    </div>
        @vite('resources/js/app.js')

    </body>
</html>
