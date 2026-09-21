<template>
    <div class="container">
       <!-- <form class="row g-3 needs-validation" novalidate> -->
            <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text"
                            class="form-control"
                            id="nombre"
                            name="nombre"
                            v-model="nombre"
                            placeholder="Ingrese su nombre">
                            {{persona }}
                            <div v-if="errors.nombre" class="invalid-feedback d-block">
                                {{ errors.nombre }}
                            </div>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input  type="text"
                                class="form-control"
                                id="apellido"
                                name="apellido"
                                v-model="apellido"
                                placeholder="Ingrese su apellido">


                            <div v-if="errors.apellido" class="invalid-feedback d-block">
                                {{ errors.apellido }}
                            </div>
                    </div>

                </div>

                <div class="row">
                    <div class="mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="rut" class="form-label">Rut</label>
                            <input type="text"
                                class="form-control"
                                id="rut"
                                name="rut"
                                v-model="rut"
                                placeholder="Ingrese su rut">

                            <div v-if="errors.rut" class="invalid-feedback d-block">
                                {{ errors.rut }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="formFile"  @change="seleccionarImagen">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <button  class="btn btn-primary mb-3" @click="agregarPersona()">Guardar</button>

                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
        <!-- </form> -->
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        data(){
            return{
                errors:{
                    nombre: '',
                    apellido:'',
                    rut :''
                },
                nombre: '',
                apellido: '',
                rut: '',
                imagen: null,
                isValid:null

            }
        },
        created(){

        },
        methods: {
            agregarPersona(){

                if (!this.validarForm()) {
                    console.log('no pasa');
                    return;
                }

                const formData = new FormData();

                // 2. Agrega los campos de texto
                formData.append('nombre', this.nombre);
                formData.append('apellido',this.apellido);
                formData.append('rut',this.rut);
                if (this.imagen) {
                    formData.append('imagen',this.imagen);
                }

                //enviar parametros al store
                axios.post('/personas', formData)
                .then(response => {

                })
                .catch(error => {
                    console.log(error);
                });

            },
            seleccionarImagen(event) {
                this.imagen = event.target.files[0];
            },
            validarForm(){

                let isValid = true;

                //limpiar error en cada validacion
                Object.keys(this.errors).forEach(key => {
                    this.errors[key] = '';
                });
                if(!this.nombre){
                    isValid = false;
                    this.errors.nombre = 'Debes ingresar Nombre';
                }
                 if(!this.apellido){
                    isValid = false;
                    this.errors.apellido =  'Debes ingresar Apellido';
                }
                if(!this.rut){
                    isValid = false;
                    this.errors.rut = 'Debes ingresar rut';
                }

                return isValid;
            }
        },

        props:['persona']
    }
</script>

