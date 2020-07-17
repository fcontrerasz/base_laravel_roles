@extends('layouts.admin')

@section('breadcrumbs')
    <h2>{{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title" : '' }}</h2>
    {{ Breadcrumbs::render('roles.listar') }}
@endsection

@section('content')

 <div class="row border-bottom ">
        <div class="col-md-12 p-sm">


        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
                <div class="alert alert-{{ $msg }}">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach

            <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="row m-b-sm m-t-sm">

                                <div class="col-md-12">

                                <div class="dt-buttons btn-group pull-right">

                                @can('roles.exportar')
                                    <a href="{{ URL::route('usuarios.exportar') }}" target="_blank" class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span>
                                    </a>
                                @endcan

                                @can('roles.crear')
                                 <a class="btn btn-primary" href="{{ route('roles.crear') }}">Nuevo Rol</a>
                                @endcan

                                </div>

                                </div>
                            </div>

                            
                         @can('roles.listar')

                        <div class="table-responsive">
                    <table class="table table-hover small ">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>NOMBRE</td>
                                <td>PERMISOS</td>
                                <td style="width: 50px">ACCION</td>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach ($role->permissions()->pluck('name') as $permission)
                                            <span class="badge badge-default">{{ $permission }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ Form::open(array('route' => ['roles.eliminar', $role->id] , 'class' => 'pull-right m-xs btn_delete_user')) }}

                                        <div class="btn-group btn-group-md  btn-group-table" role="group">
                                        @can('roles.editar')

                                        <a class="btn btn-md btn-default" href="{{ route('roles.editar',[$role->id]) }}"><i class="fa fa-pencil grey" aria-hidden="true"></i></a>

                                        @endcan

                                        @can('roles.eliminar')

                                            
                                            {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-warning btn-md', 'type' => 'submit']) }}
                                            

                                        @endcan

                                        </div>

                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                        @empty
                            <p>No existen Roles</p>
                        @endforelse


                       
                        </tbody>
                    </table>
                    
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

@section('content')

    <div class="col-lg-12">



        <div class="card card-block sameheight-item">
            <div class="title-block">
                
            </div>

            <section class="example">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>



                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>

@endsection


@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('roles.mass_destroy') }}';
    </script>
@endsection