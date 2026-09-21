<template>
    <div>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre_filtro" v-model="this.nombre_filtro" aria-describedby="helpId" placeholder="Ingresa el nombre">
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
                </div>

            </div>
            <div class="col-2">
                <br>
                <button type="button" class="btn btn-success rounded-circle"  title="Buscar" v-on:click="listarProductos()">
                    <i class="bi bi-search"></i>
                </button>

                <button type="button" class="btn btn-warning rounded-circle" style="margin-left: 10px;" title="Limpiar" v-on:click="limpiarFiltros()">
                    <i class="bi bi-x-circle"></i>
                </button>

            </div>

        </div>
        <br>
        <div class="row">
            <add-producto
                :marcas="marcas"
                :categorias="categorias"
                @producto-agregado="listarProductos">
            </add-producto>
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
                    <th class="col-4">Acciones</th>
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
                    <a
                        :href="'/productos/' + producto.id"
                        class="btn btn-primary rounded-circle"
                        title="Ver"
                    >
                        <i class="bi bi-eye"></i>
                    </a>
                    </td>
                    <td class="col-2">
                        <button type="button" class="btn btn-primary rounded-circle"  title="Eliminar"  v-on:click="eliminarProducto(producto.id)">
                             <i class="bi bi-trash3" ></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <!--PAGINACION  -->
                    <nav v-if="ultimaPagina > 1">

                        <ul class="pagination justify-content-center">

                            <!-- Anterior -->
                            <li
                                class="page-item"
                                :class="{ disabled: paginaActual === 1 }"
                            >
                                <button
                                    class="page-link"
                                    @click="listarProductos(paginaActual - 1)"
                                    :disabled="paginaActual === 1"
                                >
                                    Anterior
                                </button>
                            </li>

                            <!-- Números -->
                            <li
                                v-for="pagina in ultimaPagina"
                                :key="pagina"
                                class="page-item"
                                :class="{ active: paginaActual === pagina }"
                            >

                                <button
                                    class="page-link"
                                    @click="listarProductos(pagina)"
                                >
                                    {{ pagina }}
                                </button>

                            </li>

                            <!-- Siguiente -->
                            <li
                                class="page-item"
                                :class="{ disabled: paginaActual === ultimaPagina }"
                            >
                                <button
                                    class="page-link"
                                    @click="listarProductos(paginaActual + 1)"
                                    :disabled="paginaActual === ultimaPagina"
                                >
                                    Siguiente
                                </button>
                            </li>

                        </ul>

                    </nav>
                </tr>
            </tbody>
        </table>
    </div>

</template>
<script>
    import axios from 'axios';
    import Swal from 'sweetalert2';

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
                paginaActual: 1,
                ultimaPagina: 1,
                totalProductos: 0,
                porPagina: 10
            }
        },
        created(){
            this.obtenerData();
        },
        mounted(){

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

            listarProductos(pagina = 1){
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
                formData.append('page', pagina);

                axios.post('/productos/listar',formData)
                .then(response => {

                    const data = response.data.productos;
                    this.productos = data.data;

                    this.paginaActual = data.current_page;
                    this.ultimaPagina = data.last_page;
                    this.totalProductos = data.total;

                    // this.productos = response.data.productos;
                    this.productos = response.data.productos.data;

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
            },
            eliminarProducto(producto_id){
               Swal.fire({
                    title: '¿Eliminar producto?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {

                    if (result.isConfirmed) {
                        this.deleteProducto(producto_id);
                    }

                });
            },
            deleteProducto(producto_id){
                axios.delete('/productos/'+ producto_id)
                .then(response => {

                    toastr.success(response.data.mensaje)
                    this.listarProductos( this.paginaActual);
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }

    }
</script>


