<template>
    <div>

        <div class="row">

            <!-- Código -->
            <div class="col-md-4 mb-3">
                <label class="form-label">Código</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="producto.codigo"
                    required
                    :class="{ 'is-invalid': errores.codigo.visible }"
                >
                <div v-if="this.errores.codigo.visible">
                    <small class="text-danger">{{ this.errores.codigo.mensaje }}</small>
                </div>
            </div>

            <!-- Nombre -->
            <div class="col-md-8 mb-3">
                <label class="form-label">Nombre</label>

                <input
                    type="text"
                    class="form-control"
                    v-model="producto.nombre"
                    required
                    :class="{ 'is-invalid': errores.nombre.visible }"
                >
                <div v-if="this.errores.nombre.visible">
                    <small class="text-danger">{{ this.errores.nombre.mensaje }}</small>
                </div>
            </div>

            <!-- Descripción -->
            <div class="col-12 mb-3">
                <label class="form-label">Descripción</label>

                <textarea
                    class="form-control"
                    rows="3"
                    v-model="producto.descripcion"
                    :class="{ 'is-invalid': errores.descripcion.visible }"
                ></textarea>
                <div v-if="this.errores.descripcion.visible">
                    <small class="text-danger">{{ this.errores.descripcion.mensaje }}</small>
                </div>
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
                    v-model.number="producto.categoria_id"
                >
                    <option value="">Seleccione</option>

                    <option
                        v-for="categoria in categorias"
                        :key="categoria.id"
                        :value="categoria.id"
                        :selected="Number(categoria.id) === Number(producto.categoria_id)"
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
                        v-model="activoChecked"
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
        <div class="row">
            <div class="col-auto">
                <button  class="btn btn-primary mb-3" @click="guardarProducto()">Guardar</button>

            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        marcas: Array,
        categorias: Array,
        producto: {
            type: Object,
            required: true
        }
    },

    data() {
        return {
            errores:{
                codigo: {
                    visible: false,
                    mensaje: "Código obligatorio"
                },
                nombre: {
                    visible: false,
                    mensaje: "Nombre obligatorio"
                },
                descripcion: {
                    visible: false,
                    mensaje: "Descripcion obligatoria"
                },

            },
            errors: 0,

            imagenes: [],
            imagen: null,
        }
    },
    mounted() {

        //     console.log('producto:', this.producto);
        // console.log('categoria_id:', this.producto.categoria_id);
        // console.log('categorias:', this.categorias);
        //    const categoriaId = Number(this.producto.categoria_id);

        //   this.producto.activo = Boolean(Number(this.producto.activo));
        //     console.log('activo:', this.producto.activo);
    },
    computed: {
    activoChecked: {
            get() {
                return Boolean(Number(this.producto.activo));
            },
            set(value) {
                this.producto.activo = value;
            }
        }
    },

    methods: {


        seleccionarImagen(e) {
            this.imagenes = Array.from(e.target.files)
        },

        guardarProducto() {

            if (!this.validarForm()) {
                console.log('no sapsa');
                return;
            }
            const formData = new FormData()

            Object.keys(this.producto).forEach(key => {
                formData.append(key, this.producto[key])
            })
            formData.append('cat_selec', this.categoria_id)
           if (this.imagenes.length > 0) {
                // formData.append('imagen', this.imagen)
                this.imagenes.forEach(imagen => {
                    formData.append('imagenes[]', imagen)
                })
            }
            console.log(this.producto);
            axios.post('/productos/update', formData)
                .then((response) => {

                    this.$emit('producto-agregado')
                    toastr.success(response.data.mensaje)
                    // const modal = document.getElementById('modalProducto')
                    // bootstrap.Modal.getInstance(modal).hide()

                    // this.resetFormulario()

                })
                .catch(error => {

                    if (error.response && error.response.status === 422) {
                        console.log(error.response.data.mensaje)
                        toastr.error(error.response.data.mensaje);
                        this.errores.codigo.visible = true;
                        this.errores.codigo.mensaje = error.response.data.mensaje;
                    } else {
                        console.error(error)
                    }
                })
        },

        validarForm(){

            //limpiar errores
            Object.values(this.errores).forEach(error => {
                error.visible = false
            })
            this.errors = 0;


            if (this.producto.codigo === '') {
                console.log('sin codi');
                this.errores.codigo.visible = true;
                this.errors++;
            }
            if (this.producto.nombre === '') {
                this.errores.nombre.visible = true;
                this.errors++;
            }
            if (this.producto.descripcion === '') {
                this.errores.descripcion.visible = true;
                this.errors++;
            }
            if (this.errors > 0){
                return false;
            }

            return true;
        }


    }
}
</script>
