<template>
    <router-view></router-view>
</template>

<script>
  //import loading from './components/ayuda/Bar.vue'

  export default {
    props: ['usuario'],
    data() {
      return {
        //
      }
    },
    mounted(){
      var obj = JSON.parse(this.usuario);
      console.log(obj.idusr);
    },
    methods:{

    },
    components: {
      //loading
    }
  }
</script>