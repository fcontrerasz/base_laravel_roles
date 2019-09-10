//import Demo from './components/Demo.vue';
import Component from './components/demo.vue'
const MyPlugin = {
  install(Vue, options) {
  	Vue.myMethod = function () {
    console.log('It worked!')
  }
  Vue.prototype.mySecondMethod = function () {
     console.log('My second Method ')
  }
    Vue.component('x-demo', Component)
  	/*Vue.mixin({
      mounted() {
        console.log('Mounted!');
      }
    });*/
  }
};

export default MyPlugin;