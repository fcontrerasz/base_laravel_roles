<template>
  <transition name="fade">
    <div class="loading-bar" v-show="show">
      <div class="progress-line"></div>
    </div>
  </transition>
</template>
<script>
  export default {
    name: 'XLoadingBar',
    data() {
      return {
        show: false
      }
    },
    methods: {
      start() {
        alert("111111");
        this.show = true
      },
      finish() {
        this.show = false
      }
    }
  }
</script>