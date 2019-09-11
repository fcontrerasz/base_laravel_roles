<template>
<div class="row border-bottom white-bg">
        <div class="col-md-12">

            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Listado de Usuarios Web</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">

                          <div class="alert alert-danger" v-if="has_error">
                              <p>Erreur, impossible de récupérer la liste des utilisateurs.</p>
                          </div>

                        <div class="row m-b-sm m-t-sm">

                                <div class="col-md-12">

                                <div class="dt-buttons btn-group pull-right">
                                
                                <a href="" target="_blank" class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span>
                                </a>
                                <a class="hide btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>PDF</span></a>
                                <a class="hide btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0"><span>Imprimir</span></a>
                                 <a class="btn btn-primary" href="">Nuevo Usuario</a>
                                </div>

                                </div>
                            </div>
                        
                        <div class="table-responsive">
                    <table class="table table-hover small ">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>USUARIO</td>
                                <td>NOMBRE</td>
                                <td>CORREO</td>
                                <td>ACTIVO</td>
                                <td style="width: 50px">ACCION</td>
                            </tr>
                        </thead>
                        <tbody>

                          <tr v-for="item in usuarios">
                                <td>{{ item.idusr }}</td>
                                <td>{{ item.username }}</td>
                                <td>{{ item.name }}</td>
                                <td>{{ item.email }}</td>
                                <td>{{ item.activado }}</td>
                                <td>
                                    <div class="btn-group">

                                    <a class="btn btn-sm btn-info" href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                    </div>

                                </td>
                            </tr>
                       
                        </tbody>
                    </table>
                   
                </div>
                        
                    </div>
                </div>



            
        </div>
    </div>
</template>

<script>
  import userList from '../../components/usuarios/listar-usuarios.vue'
  export default {
    data() {
      return {
        has_error: false,
        usuarios: {}
      }
    },
    mounted() {

    },
    components: {
        userList
    },
    created: function(){

      let _self = this;

      function getDATOS() {
            return axios.get('/usuarios')
            .then(response => {
                   var xusuarios = response.data.records;
                   console.log(xusuarios);
                   _self.usuarios = xusuarios;                   
            }).catch(function (error) {
                    console.log('Error: ' + error);
            });
      }

      axios.all([getDATOS()])
              .then(axios.spread(function (acct, perms) {
               // alert("completado");
               //  vm.ocupado = false;
               //  vm.currentTab = 0;
            }));


    }
  }
</script>