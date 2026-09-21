<template>
    <div>
        <h1>Mi componente</h1>
        <p>{{ mensaje }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            mensaje: '¡Hola desde mi componente!'
        };
    }
};
</script>

<style scoped>
/* Estilos específicos del componente */
</style>
