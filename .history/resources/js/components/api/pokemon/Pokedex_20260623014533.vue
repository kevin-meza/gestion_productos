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

    <div class="card" style="width: 30rem;background-color:red" v-if="infoPokemon">

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
        <!-- <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div> -->
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
</style>
