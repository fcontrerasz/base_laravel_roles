@extends('layouts.admin')

@section('breadcrumbs')
    <h2>{{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title" : '' }}</h2>
    {{ Breadcrumbs::render('usuarios.listar') }}
@endsection

@section('content')

 <div class="row border-bottom ">
        <div class="col-md-12 p-sm">

            <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="row m-b-sm m-t-sm">

                                <div class="col-md-12">

                                <div class="dt-buttons btn-group pull-right">
                                
                                
                                @can('usuarios.exportar')
                                <a href="{{ URL::route('usuarios.exportar') }}" target="_blank" class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span>
                                </a>
                                @endcan

                                @can('usuarios.crear')
                                 <a class="btn btn-primary" href="{{ URL::route('usuarios.crear') }}">Nuevo Usuario</a>
                                 @endcan

                                </div>

                                </div>
                            </div>

                            @can('usuarios.listar')
                        
                        <div class="table-responsive">
                    <table class="table table-hover small ">
                        <thead>
                            <tr>
                                <td>@sortablelink('id','ID')</td>
                                <td>USUARIO</td>
                                <td>NOMBRE</td>
                                <td>CORREO</td>
                                <td>ACTIVO</td>
                                <td style="width: 50px">ACCION</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($nerds as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->username }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>@if($value->activado = 1)  
                                    <span class="badge badge-default">ACTIVO</span>      
             
@else
                <span class="badge badge-default">OCULTO</span>
@endif</td>
                                <td>

                                    

                                    

                                    {{ Form::open(array('url' => 'admin/usuarios/' . $value->id, 'class' => 'pull-right m-xs btn_delete_user')) }}

                                        @csrf

                                        <div class="btn-group btn-group-md btn-group-table" role="group">

                                        {{ Form::hidden('_method', 'DELETE') }}

                                        @can('usuarios.clave')

                                        <a class="btn btn-md btn-default" href="{{ URL::route('usuarios.clave', ['id' => $value->id ]) }}"><i class="fa fa-key" aria-hidden="true"></i></a>

                                        @endcan

                                        @can('usuarios.editar')

                                        <a class="btn btn-md btn-default" href="{{ URL::route('usuarios.editar', ['id' => $value->id ]) }}"><i class="fa fa-pencil grey" aria-hidden="true"></i></a>

                                        @endcan

                                        @can('usuarios.eliminar')

                                        {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-warning btn-md', 'type' => 'submit']) }}

                                        @endcan

                                        </div>
                                    

                                    {{ Form::close() }}
                           

                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                                    

                                    

                                   

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $nerds->appends(request()->except('page'))->render() !!}
                </div>

                @else

                <h4>No tienes permisos</h4>
            

                @endcan
                        
                    </div>
                </div>



            
        </div>
    </div>


        



@endsection


@section('scripts_base')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script type="text/javascript">
        
        $('.btn_delete_user').on('submit', function(e) {
          var form = this;

          e.preventDefault(); // <--- prevent form from submitting

          Swal.fire({
                  title: false,
                  text: "¿Estas seguro?",
                  icon: false,
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, Eliminar'
                }).then((result) => {
                  if (result.value) {
                    form.submit();
                   }
                })



        });

    </script>


@endsection