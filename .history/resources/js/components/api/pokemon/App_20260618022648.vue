<template>
    <table>
        <tr>
            <td>
                <div class="input-group mb-3">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1" @click="getPokemon()">Button</button>
                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" v-model="nombrePokemon">
                </div>
            </td>
        </tr>

    </table>
  <div class="card" style="width: 18rem;">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <!-- <h5 class="card-title">aa {{ infoPokemon.nombre }}</h5> -->
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import axios from 'axios';

    const infoPokemon = ref(null)
    let nombrePokemon = ref('')

    const getPokemon = async () => {
        try {
            const res = await axios.get('/pokemon/get-info/' + nombrePokemon.value);
            infoPokemon.value[0] = res.data;

            console.log(infoPokemon.value[0]);
        } catch (error) {
            console.error(error);
        }
    }
    onMounted(() => {
    // getPokemon()
    })
</script>

<style scoped>
div{
    text-align: center;
}
</style>
