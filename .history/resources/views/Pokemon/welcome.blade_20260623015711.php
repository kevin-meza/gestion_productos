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
          <div class="circulo-blanco"><div class="circulo"></div></div>

        <h1 class="text-primary">Pokédex</h1>
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
            width: 50px;         /* Mismo ancho */
            height: 50px;        /* Mismo alto */
            background-color: #3498db; /* Color de fondo */
            border-radius: 50%;   /* Convierte el cuadrado en círculo */
            position: absolute
        }
         .circulo-blanco {
            width: 60px;         /* Mismo ancho */
            height: 60px;        /* Mismo alto */
            background-color: #ffffff; /* Color de fondo */
            border-radius: 50%;   /* Convierte el cuadrado en círculo */
            position: initial

        }
    </style>
    </body>
</html>
