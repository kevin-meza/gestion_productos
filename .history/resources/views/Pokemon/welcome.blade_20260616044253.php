<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
