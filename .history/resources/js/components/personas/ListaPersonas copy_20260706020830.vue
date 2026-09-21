<template>
    <div>
        <div class="row">
            <div class="col-10">
                <h1>Lista de personas</h1>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-primary rounded-circle"  data-bs-toggle="modal" data-bs-target="#miVentanaModal" title="Agregar">
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
                        <button type="button" class="btn btn-primary rounded-circle" v-on:click="agregarPersona()" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </td>
                    <td class="col-2">
                        <button type="button" class="btn btn-primary rounded-circle" v-on:click="agregarPersona()" title="Eliminar">
                             <i class="bi bi-trash3" ></i>
                        </button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miVentanaModal">
        Abrir ventana
    </button>

<!-- Estructura de la ventana modal -->
<div class="modal fade" id="miVentanaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título de la ventana</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        Aquí puedes colocar tu texto, imágenes o un formulario.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar cambios</button>
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
                personas:[]
            }
        },
        created(){
            this.obtenerPersonas();
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
            agregarPersona(){
                console.log('click');
            }
        }
        // props:['tareas']
    }
</script>

