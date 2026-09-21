<template>
    <div>
        <button
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalProducto"
        >
            Agregar producto
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="modalProducto"
            tabindex="-1"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">
                            Agregar producto
                        </h5>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                        ></button>
                    </div>

                    <div class="modal-body">

                        <form>

                            <div class="row">

                                <!-- Código -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Código</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="producto.codigo"
                                        required
                                    >
                                    <div v-if="this.errores.codigo.visible">{{ this.errores.codigo.mensaje }}</div>
                                </div>

                                <!-- Nombre -->
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Nombre</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="producto.nombre"
                                        required
                                    >
                                </div>

                                <!-- Descripción -->
                                <div class="col-12 mb-3">
                                    <label class="form-label">Descripción</label>

                                    <textarea
                                        class="form-control"
                                        rows="3"
                                        v-model="producto.descripcion"
                                    ></textarea>
                                </div>

                                <!-- Marca -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Marca</label>

                                    <select
                                        class="form-select"
                                        v-model="producto.marca_id"
                                    >
                                        <option value="">Seleccione</option>

                                        <option
                                            v-for="marca in marcas"
                                            :key="marca.id"
                                            :value="marca.id"
                                        >
                                            {{ marca.nombre }}
                                        </option>
                                    </select>
                                </div>

                                <!-- Categoría -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Categoría</label>

                                    <select
                                        class="form-select"
                                        v-model="producto.categoria_id"
                                    >
                                        <option value="">Seleccione</option>

                                        <option
                                            v-for="categoria in categorias"
                                            :key="categoria.id"
                                            :value="categoria.id"
                                        >
                                            {{ categoria.nombre }}
                                        </option>
                                    </select>
                                </div>

                                <!-- Precio compra -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Precio compra</label>

                                    <input
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        class="form-control"
                                        v-model="producto.precio_compra"
                                    >
                                </div>

                                <!-- Precio venta -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Precio venta</label>

                                    <input
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        class="form-control"
                                        v-model="producto.precio_venta"
                                    >
                                </div>

                                <!-- Stock -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Stock</label>

                                    <input
                                        type="number"
                                        min="0"
                                        class="form-control"
                                        v-model="producto.stock"
                                    >
                                </div>

                                <!-- Stock mínimo -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Stock mínimo</label>

                                    <input
                                        type="number"
                                        min="0"
                                        class="form-control"
                                        v-model="producto.stock_minimo"
                                    >
                                </div>

                                <!-- Unidad -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Unidad medida</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="producto.unidad_medida"
                                    >
                                </div>

                                <!-- Imagen -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Imagen</label>

                                    <input
                                        ref="inputImagenes"
                                        type="file"
                                        class="form-control"
                                        multiple="true"
                                        @change="seleccionarImagen"
                                    >
                                </div>

                                <!-- Activo -->
                                <div class="col-md-6 mb-3 d-flex align-items-end">

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="activo"
                                            v-model="producto.activo"
                                        >

                                        <label
                                            class="form-check-label"
                                            for="activo"
                                        >
                                            Producto activo
                                        </label>

                                    </div>

                                </div>

                            </div>

                            <div class="modal-footer">

                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                    v-on:click="resetFormulario"
                                >
                                    Cancelar
                                </button>
                                <!-- type="submit" cierra el modal-->
                                <button

                                    type="button"
                                    class="btn btn-primary"
                                    v-on:click="guardarProducto"
                                >
                                    Guardar producto
                                </button>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        marcas: Array,
        categorias: Array
    },

    data() {
        return {
            producto: {
                codigo: '',
                nombre: '',
                descripcion: '',
                marca_id: '',
                categoria_id: '',
                precio_compra: 0,
                precio_venta: 0,
                stock: 0,
                stock_minimo: 0,
                unidad_medida: 'unidad',
                activo: true
            },
            errores:{
                codigo: {
                    visible: false,
                    mensaje: "Código obligatorio"
                },
                nombre: {
                    visible: false,
                    mensaje: "Nombre obligatorio"
                },

            },

            imagenes: [],
            imagen: null,
        }
    },

    methods: {

        seleccionarImagen(e) {
            this.imagenes = Array.from(e.target.files)
        },

        guardarProducto() {
            this.validarForm();
            const formData = new FormData()

            Object.keys(this.producto).forEach(key => {
                formData.append(key, this.producto[key])
            })

           if (this.imagenes.length > 0) {
                // formData.append('imagen', this.imagen)
                this.imagenes.forEach(imagen => {
                    formData.append('imagenes[]', imagen)
                })
            }

            axios.post('/productos', formData)
                .then((response) => {

                    this.$emit('producto-agregado')
                    toastr.success(response.data.mensaje)
                    // const modal = document.getElementById('modalProducto')
                    // bootstrap.Modal.getInstance(modal).hide()

                    this.resetFormulario()

                })
                .catch(error => {

                    if (error.response && error.response.status === 422) {
                        console.log(error.response.data.mensaje)
                        toastr.error(error.response.data.mensaje);
                    } else {
                        console.error(error)
                    }
                })
        },

        resetFormulario() {
            this.producto = {
                codigo: '',
                nombre: '',
                descripcion: '',
                marca_id: '',
                categoria_id: '',
                precio_compra: 0,
                precio_venta: 0,
                stock: 0,
                stock_minimo: 0,
                unidad_medida: 'unidad',
                activo: true
            }

            this.imagenes = [],
            this.$refs.inputImagenes.value = ''
        },

        validarForm(){

            if(!this.codigo){
                this.errores.codigo.visible = true;
            }
            if(!this.nombre){
                this.errores.nombre.visible = true;
            }
            if(!this.descripcion){
                this.errores.descripcion.visible = true;
            }
        }


    }
}
</script>
