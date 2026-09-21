<template>
    <table>
        <tr>
            <td>
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" @click="getPokemon()">Buscar</button>
                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" v-model="nombrePokemon">
                </div>
            </td>
        </tr>

    </table>
    <div class="pantalla">
        <div class = "card" style="width: 30rem;" v-if="infoPokemon">

            <!-- Nombre -->
            <h5 class="card-title"> {{ infoPokemon.nombre}} N.°{{infoPokemon.id}}</h5>

            <!-- Imagen -->
            <div v-for="imagen in infoPokemon.imagenes" :key="imagen.imagenes">
                <img class="card-img-top" :src="imagen" alt="">
            </div>

            <div class="card-body">

                <p class="card-text">{{ infoPokemon.descripcion }}</p>

                <table class="table">
                    <tbody>
                        <tr>
                            <td> Altura: {{ infoPokemon.altura}} M </td>
                            <td> Peso: {{ infoPokemon.peso}} KG </td>
                        </tr>
                        <tr>
                            <td>Tipo: {{ infoPokemon.tipo}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="circulo-rojo"></div>
        <div class="row">
            <span class="badge text-bg-secondary">New</span>
              <span class="badge text-bg-secondary">New</span>
        </div>

    </div>
    <div class = "card" style="width: 30rem;" v-if="infoPokemon">

        <!-- Nombre -->
        <h5 class="card-title"> {{ infoPokemon.nombre}} N.°{{infoPokemon.id}}</h5>

        <!-- Imagen -->
        <div v-for="imagen in infoPokemon.imagenes" :key="imagen.imagenes">
            <img class="card-img-top" :src="imagen" alt="">
        </div>

        <div class="card-body">

            <p class="card-text">{{ infoPokemon.descripcion }}</p>

            <table class="table">
                <tbody>
                    <tr>
                        <td> Altura: {{ infoPokemon.altura}} M </td>
                        <td> Peso: {{ infoPokemon.peso}} KG </td>
                    </tr>
                    <tr>
                        <td>Tipo: {{ infoPokemon.tipo}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import axios from 'axios';

    let infoPokemon = ref(null)
    let nombrePokemon = ref('')

    const getPokemon = async () => {
        try {
            const res = await axios.get('/pokemon/get-info/' + nombrePokemon.value);
            infoPokemon.value = res.data;

            console.log(infoPokemon.value);
        } catch (error) {
            console.error(error);
        }
    }
    onMounted(() => {

    })
</script>

<style scoped>
div{
    text-align: center;
}
   .pantalla {
        width: 80%;
        background-color: #bcbcbc;
        border: 10px solid #bcbcbc;

     /* Recorte con los 5 puntos de la Pokédex */
    clip-path: polygon(
        0% 0%,       /* 1. Superior izquierda */
        100% 0%,     /* 2. Superior derecha */
        100% 100%,   /* 3. Inferior derecha */
        20px 100%,   /* 4. Inicio del corte diagonal (ajustable) */
        0% calc(100% - 20px) /* 5. Fin del corte diagonal (ajustable) */
    );
   }
    .circulo-rojo {
            height: 30px;
            width: 30px;
            background-color: red;
            margin-left: 10px;
            margin-top: 10px;
            /* border: 5px solid #ffffff; */

        }
</style>
