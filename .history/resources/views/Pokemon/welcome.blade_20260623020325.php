<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="antialiased">
    <div class="main">
            <div class="row">
                <div class="col-1"><div class="circulo"></div></div>
                <div class="col-2"> <div class="circulo-rojo"></div></div>
            </div>





        {{-- <h1 class="text-primary">Pokédex</h1> --}}
        <div id="app">
            <ApiPokemon></ApiPokemon>
        </div>
    </div>
        @vite('resources/js/app.js')
    <style>
        .main{
            background-color: rgb(233, 54, 54);
            width: 50%;
            position: center;
        }

        .circulo {
            height: 60px;
            width: 60px;
            background-color: #3498db; /* celeste */
            border-radius: 50%;
            border: 5px solid #ffffff; /* borde blanco */

        }
        .circulo-rojo {
            height: 30px;
            width: 30px;
            background-color: #da2800; /* celeste */
            border-radius: 50%;
            /* border: 5px solid #ffffff; */

        }

    </style>
    </body>
</html>
