<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading" 
        :can-cancel="false" 
        :is-full-page="true"></loading>
    </div>
</template>
<style>
.vld-overlay.is-full-page {
    /*z-index: 1051 !important;*/
}
.vld-overlay .vld-background{
    background: #1c1c21;
    opacity: 0.7;
}
</style>
 
<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    
    export default {
        name: 'x-loading',
        data() {
            return {
                isLoading: false
            }
        },
        components: {
            Loading
        },
        methods: {
          start() {
            this.isLoading = true
          },
          finish() {
            this.isLoading = false
          }
        }
    }
</script> 