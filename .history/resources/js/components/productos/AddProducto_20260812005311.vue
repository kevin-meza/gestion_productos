<template>
    <div>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" class="form-control" name="nombre_filtro" v-model="this.nombre_filtro" aria-describedby="helpId" placeholder="Ingresa el nombre">
                  <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>

            </div>
            <div class="col-3">
                <div class="form-group">
                  <label for="marca_filtro">Marca</label>
                    <select name="marca_filtro" id="marca_filtro" v-model="marca_filtro" class="form-select">
                        <option :value="null" selected>Todas</option>

                        <option
                            v-for="marca in marcas"
                            :key="marca.id"
                            :value="marca.id"
                        >
                            {{ marca.nombre }}
                        </option>
                    </select>
                </div>

            </div>
            <div class="col-3">
                <div class="form-group">
                  <label for="">Categoria</label>
                    <select name="categoria_filtro" id="categoria_filtro" v-model="categoria_filtro" class="form-select">
                        <option :value="null" selected>Todas</option>

                        <option
                            v-for="categoria in categorias"
                            :key="categoria.id"
                            :value="categoria.id"
                        >
                            {{ categoria.nombre }}
                        </option>
                    </select>
                </div>

            </div>
            <div class="col-2">
                <div class="form-group">
                  <label for="">Codigo</label>
                  <input type="text" class="form-control" name="codigo_filtro" id="codigo_filtro" v-model="this.codigo_filtro" aria-describedby="codigo" placeholder="Ingresa el codigo">
                  <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>

            </div>
            <div class="col-2">
                <br>
                <button type="button" class="btn btn-primary rounded-circle"  title="Buscar" v-on:click="listarProductos()">
                    <i class="bi bi-search"></i>
                </button>

                 <button type="button" class="btn btn-primary rounded-circle"  title="Limpiar" v-on:click="limpiarFiltros()">
                    <i class="bi bi-x-circle"></i>
                </button>

            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-2">
                <button type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#miModal">
                Agregar Producto
            </button>
            </div>
        </div>
        <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">
                    Mi modal
                </h5>

                <!-- Botón X -->
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar">
                </button>
            </div>

            <div class="modal-body">
                Contenido del modal
            </div>

            <div class="modal-footer">
                <!-- Botón cerrar -->
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cerrar
                </button>
            </div>

        </div>
    </div>
</div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th class="col-2">Producto</th>
                    <th class="col-2">Marca</th>
                    <th class="col-2">Categoria</th>
                    <th class="col-2">Codigo</th>
                    <th class="col-2">stock</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="producto in productos" :key="producto.id">
                    <td >{{ producto.nombre }}</td>
                    <td>{{ producto.marca ? producto.marca.nombre : '' }}</td>
                    <td>{{ producto.categoria ? producto.categoria.nombre : null}}</td>
                    <td>{{ producto.codigo }}</td>
                    <td>{{ producto.stock }}</td>
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
                personas: [],
                categorias:[],
                productos:[],
                marcas:[],
                nombre_filtro: null,
                marca_filtro: null,
                codigo_filtro: '',
                categoria_filtro: null,
                personaSeleccionada: null,
                mostrarModalEdit: false,
            }
        },
        created(){
            this.obtenerData();
        },
        mounted(){
            // document.getElementById('modalAdd')
            // .addEventListener('hidden.bs.modal', () => {
            //     this.personaSeleccionada = [];
            // });

            // document.getElementById('modalDelete')
            // .addEventListener('hidden.bs.modal', () => {
            //     this.personaSeleccionada = [];
            // });
        },
        methods: {

            obtenerData(){

                axios.get('/productos/create')
                .then(response => {
                    this.categorias = response.data.categorias;
                    this.marcas = response.data.marcas;
                    this.listarProductos();
                })
                .catch(error => {
                    console.log(error);
                });
            },

            listarProductos(){
                const formData = new FormData();
                console.log(this.nombre_filtro);
                if(this.nombre_filtro){
                    formData.append('nombre_filtro', this.nombre_filtro);
                }
                if(this.marca_filtro){
                    formData.append('marca_filtro', this.marca_filtro);
                }
                if(this.categoria_filtro){
                    formData.append('categoria_filtro', this.categoria_filtro);
                }
                if(this.codigo_filtro){
                    formData.append('codigo_filtro', this.codigo_filtro);
                }

                axios.post('/productos/listar',formData)
                .then(response => {
                    this.productos = response.data.productos;
                })
                .catch(error => {
                    console.log(error);
                });

            },
            limpiarFiltros(){
                this.nombre_filtro = '';
                this.marca_filtro = null;
                this.categoria_filtro = null;
                this.codigo_filtro = '';
            }
            // cargarModal(persona){
            //     this.personaSeleccionada = persona;
            //     console.log(this.personaSeleccionada);

            // },
            // cargarModalAdd(){
            //     this.personaSeleccionada = null;

            // },
            // eliminarPersona(id){
            //     axios.delete('/personas/'+id)
            //     .then(response => {
            //         this.obtenerPersonas();
            //         toastr.success('Persona eliminada');
            //     })
            //     .catch(error => {
            //         console.log(error);
            //     });
            // },
            // eliminarSeleccion(personaSeleccionada){
            //     personaSeleccionada = null;
            // }
        }
        // props:['tareas']
    }
</script>


