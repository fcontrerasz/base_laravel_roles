<template>

        <div class="feed-element">
                                        <div> {{ datos.id }}
                                            <small class="pull-right text-navy">1m ago</small>
                                            <strong>{{ datos.message }}</strong>
                                            <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</div>
                                            <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                        </div>
                                    </div>

</template>
  
<script>
    export default {
        props: ['datos'],
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>