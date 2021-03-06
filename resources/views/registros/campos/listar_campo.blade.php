@extends('layouts.admin')

@section('breadcrumbs')
    <h2>{{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title" : '' }}</h2>
    {{ Breadcrumbs::render('campos.listar') }}
@endsection

@section('content')

 <div class="row border-bottom ">
        <div class="col-md-12 p-sm">

            <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="row m-b-sm m-t-sm">

                                <div class="col-md-12">

                                <div class="dt-buttons btn-group pull-right">
                                
                                 @can('campos.exportar')
                                <a href="{{ URL::route('campos.exportar') }}" target="_blank" class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span>
                                </a>
                                @endcan
                                
                                 @can('campos.crear')
                                 <a class="btn btn-primary" href="{{ URL::route('campos.crear') }}">Nuevo Campo</a>
                                @endcan

                                </div>

                                </div>
                            </div>
                        
                        @can('campos.listar')

                        <div class="table-responsive">
                    <table class="table table-hover small ">
                        <thead>
                            <tr>
                                <td>@sortablelink('idcamp','ID')</td>
                                <td>@sortablelink('idtcamp','tipo')</td>
                                <td>@sortablelink('campo_titulo','TITULO')</td>
                                <td>@sortablelink('campo_descripcion','DESCRIPCION')</td>
                                <td>@sortablelink('created_at','CREACION')</td>
                                <td style="width: 50px">ACCION</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($nerds as $key => $value)
                            <tr>
                                <td>{{ $value->idcamp }}</td>
                                <td>{{ $value->idtcamp }}</td>
                                <td>{{ $value->campo_titulo }}</td>
                                <td>{{ $value->campo_descripcion }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>

                                    {{ Form::open(array('route' => ['campos.eliminar', $value->idcamp] , 'class' => 'pull-right m-xs btn_delete_user')) }}

                                        <div class="btn-group btn-group-md btn-group-table" role="group">

                                        {{ Form::hidden('_method', 'DELETE') }}

                                        <a class="btn btn-md btn-default" href="{{ URL::route('campos.editar', ['id' => $value->idcamp ]) }}"><i class="fa fa-pencil grey" aria-hidden="true"></i></a>

                                        {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-warning btn-md', 'type' => 'submit']) }}

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