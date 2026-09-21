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
                <div class="col-1"> <div class="circulo-rojo"></div></div>
                <div class="col-1"> <div class="circulo-amarillo"></div></div>
                <div class="col-1"> <div class="circulo-verde"></div></div>
            </div>


            {{-- cmponente recargable de la pokedex --}}
            <div id="app" class="pantalla">
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
            background: linear-gradient(to bottom, #ff0000, #9a0606);
            border-radius: 50%;
            /* border: 5px solid #ffffff; */

        }
        .circulo-amarillo {
            height: 30px;
            width: 30px;
            /* background-color: #96de11;  */
            background: linear-gradient(to bottom, #fff176, #fbc02d);
            border-radius: 50%;
            margin-left: -30px;
            /* border: 5px solid #ffffff; */

        }
        .circulo-verde {
            height: 30px;
            width: 30px;
                 background: linear-gradient(to bottom, #01ff38, #035b0c);

            border-radius: 50%;
            margin-left: -60px;
            /* border: 5px solid #ffffff; */

        }

    </style>
    </body>
</html>
