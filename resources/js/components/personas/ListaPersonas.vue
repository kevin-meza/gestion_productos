<template>
    <div>
        <div class="row">
            <div class="col-10">
                <h1>Lista de personas</h1>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-primary rounded-circle"  data-bs-toggle="modal" data-bs-target="#modalAdd" title="Agregar" v-on:click="cargarModalAdd()">
                    <i class="bi bi-person-plus-fill"></i>
                </button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="col-2">Nombre</th>
                    <th class="col-2">Apellido</th>
                    <th class="col-2">Rut</th>
                    <th class="col-2">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="persona in personas" :key="persona.id">
                    <td scope="row">{{ persona.nombre }}</td>
                    <td>{{ persona.apellido }}</td>
                    <td>{{ persona.rut }}</td>
                    <td class="col-2">
                    <button type="button" class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#modalAdd" title="Editar"  v-on:click="cargarModal(persona)">
                             <i class="bi bi-pencil"></i>
                    </button>
                    </td>
                    <td class="col-2">
                        <button type="button" class="btn btn-primary rounded-circle" data-bs-toggle="modal" data-bs-target="#modalDelete" title="Eliminar"  v-on:click="cargarModal(persona)">
                             <i class="bi bi-trash3" ></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Estructura modal Agregar -->

     <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <div v-if="personaSeleccionada"> <h5 class="modal-title" id="exampleModalLabel">Editar Persona</h5></div>
                    <div v-else> <h5 class="modal-title" id="exampleModalLabel">Agregar Persona</h5></div>

                </div>
                <div class="modal-body">
                    <div v-if="personaSeleccionada">
                        <edit-persona :personaSeleccionada="personaSeleccionada"  @actualizar-tabla="obtenerPersonas"></edit-persona>
                    </div>
                    <div v-else><add-personas @actualizar-tabla="obtenerPersonas"></add-personas></div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button> -->
                    <!-- <button type="button" class="btn btn-primary">Guardar cambios</button> -->
                </div>
                </div>
            </div>
        </div>


      <!-- Estructura de la ventana modal Deelte-->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div v-if="personaSeleccionada"><h5>estas seguro q deseas eliminar al user rut : {{ personaSeleccionada.rut }} ?</h5></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" v-on:click="eliminarSeleccion(personaSeleccionada)">Cancelar</button>
                <button type="button" class="btn btn-primary" v-on:click="eliminarPersona(personaSeleccionada.id)"  data-bs-dismiss="modal">Eliminar</button>
            </div>
            </div>
        </div>
    </div>

</template>
<script>
    import axios from 'axios'
    export default {
        data(){
            return{
                personas:[],
                personaSeleccionada: null,
                mostrarModalEdit: false,
            }
        },
        created(){
            this.obtenerPersonas();
        },
        mounted(){

        },
        methods: {

            obtenerPersonas(){

                axios.get('/personas/listar')
                .then(response => {
                    this.personas = response.data.personas;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            cargarModal(persona){
                this.personaSeleccionada = persona;
                console.log(this.personaSeleccionada);

            },
            cargarModalAdd(){
                this.personaSeleccionada = null;

            },
            eliminarPersona(id){
                axios.delete('/personas/'+id)
                .then(response => {
                    this.obtenerPersonas();
                    toastr.success('Persona eliminada');
                })
                .catch(error => {
                    console.log(error);
                });
            },
            eliminarSeleccion(personaSeleccionada){
                personaSeleccionada = null;
            }
        }

    }
</script>


