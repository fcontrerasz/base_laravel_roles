import 'es6-promise/auto'
import axios from 'axios'
//import './bootstrap'
import Vue from 'vue'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import auth from './auth'
import components from './componentes'
import router from './router'


window.Vue = Vue

Vue.router = router

Vue.use(components)
Vue.use(VueRouter)

Vue.component('x-modal', require('./components/modals/generico.vue').default);
//Vue.component('x-loading', require('./components/ayuda/Loading.vue').default);
Vue.component('x-button', require('./components/botones/Button.vue').default);
Vue.component('x-usuario', require('./components/usuarios/usuario.vue').default);


import MyPlugin from './demo.js'
Vue.use(MyPlugin)


Vue.component('index', Index)

Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/records`

/*
const app = new Vue({
  el: '.app',
  router
});*/

router.beforeEach((to, from, next) => {

  if (!to.matched.length) {
    next('/notFound');
  } else {
    app.$refs.xcargad.start();
    next();
  }
    
    //next()
})

Vue.mixin({
  created(){
    console.log("Componente Creado")
  },
  beforeRouteEnter (to, from, next) {
    app.$refs.xcargad.finish();
    next();
  },
  beforeRouteUpdate  (to, from, next) {
    app.$refs.xcargad.finish();
    next();
  },
  beforeRouteLeave  (to, from, next) {
    app.$refs.xcargad.finish();
    next();
  },
})

axios.interceptors.response.use(function (response) {
    return response;
  }, function (err) {
    //alert(err.response.status);
    console.log(err);

    if(err.response.status === 401) {
      app.$refs.cargador.finish();
      window.location = '/?logout=true'
    }

    if(err.response.status === 403) {
      app.$refs.cargador.finish();
      //components.Message.error(err.response.data.message, 0)
    }

    if(err.response.status === 500) {
      app.$refs.cargador.finish();
      //components.Message.error(err.response.data.message, 0)
    }

    if(err.response.status === 404) {
      app.$refs.cargador.finish();
     // components.Message.error(err.response.data.message, 0)
    }
    return Promise.reject(err);
  });


/*import VueRouter from 'vue-router'
import router from './router'
import auth from './auth'
import Index from './Index'

require('./bootstrap');

window.Vue = require('vue');

Vue.router = router
Vue.use(VueRouter)


const routes2 = [
  { path: '/', component: require('./components/Test.vue').default, name: 'Inicio' },
  { path: '/usuarios', component: require('./components/usuarios/listar-usuarios.vue').default, name: 'Usuarios' }
]

Vue.component('x-modal', require('./components/modals/generico.vue').default);
Vue.component('x-loading', require('./components/ayuda/Loading.vue').default);
Vue.component('x-button', require('./components/botones/Button.vue').default);
Vue.component('x-usuario', require('./components/usuarios/usuario.vue').default);


Vue.component('index', Index)


const router = new VueRouter({
  routes,
  history: true,
  mode: 'history'
})
  
const app = new Vue({
  router
}).$mount('#app')*/