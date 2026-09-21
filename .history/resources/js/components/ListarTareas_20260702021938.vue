<template>
  <ul>
            <!-- <li v-for="tarea in tareas" :key="tarea.id">{{ tarea.titulo }}</li> -->
        </ul>
</template>
<script>

export default {
    data(){
        return{
            tareas:[]
        }
    },
    created(){
        axios.get('/tareas')
        .then(response => console.log(response.data))
        .catch("error");
    }
    // props:['tareas']
}
</script>
