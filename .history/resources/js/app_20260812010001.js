import { createApp } from 'vue';

// import Navbar from './components/Navbar.vue';

//api
import Pokedex from './components/api/pokemon/Pokedex.vue';

//personas
import ListaPersonas from './components/personas/ListaPersonas.vue';
import AddPersona from './components/personas/FormAdd.vue';
import EditPersona from './components/personas/FormEdit.vue';

//productos
import VistaProductos from './components/productos/ListaProductos.vue';
import AddProducto from './components/productos/AddProducto.vue';
const app = createApp({});

// Registrar componentes globales
// app.component('navbar-component', Navbar);

//Personas
app.component('lista-personas', ListaPersonas);
app.component('add-personas', AddPersona);
app.component('edit-persona', EditPersona);
app.component('pokedex', Pokedex);

//productos
app.component('vista-productos', VistaProductos);
app.component('add-producto', AddProducto);

app.mount('#app');
