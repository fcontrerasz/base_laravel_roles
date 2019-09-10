<template>
    <div id="app">
      <x-usuario v-for="a in listado" :key="a.id" :datos="a"></x-usuario>
   </div>
</template>
  
<script>
    //Vue.component('x-usuario', require('./components/usuarios/Usuario.vue').default);

    export default {
        data(){

            return {

            listado: [
              { id: 1, message: 'Foo' },
              { id: 2, message: 'Bar' }
            ]

            }

        },
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>