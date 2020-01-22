<meta name="csrf-token" content="{{ csrf_token() }}">
<?php
    use \koolreport\datagrid\DataTables;
    use \koolreport\core\Utility as Util;
    use \koolreport\inputs\Select2;
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\inputs\TextBox;
?>

@extends('layouts.admin')

@section('breadcrumbs')
    <h2>{{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title" : '' }}</h2>
    {{ Breadcrumbs::render('usuarios.index') }}
@endsection

@section('content')

 <div class="row border-bottom ">
        <div class="col-md-12 p-sm">

            <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="row m-b-sm m-t-sm">

                                <div class="col-md-12">

                                <div class="dt-buttons btn-group pull-right">
                                
                                <a href="{{ URL::route('usuarios.exportar') }}" target="_blank" class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span>
                                </a>
                                <a class="hide btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>PDF</span></a>
                                <a class="hide btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0"><span>Imprimir</span></a>
                                 <a class="btn btn-primary" href="{{ URL::route('usuarios.create') }}">Nuevo Usuario</a>
                                </div>

                                </div>
                            </div>
                        
                        <div class="table-responsive">
                    <table class="table table-hover small ">
                        <thead>
                            <tr>
                                <td>@sortablelink('idusr','ID')</td>
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
                                <td>{{ $value->idusr }}</td>
                                <td>{{ $value->username }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->activado }}</td>
                                <td>

                                    {{ Form::open(array('url' => 'admin/usuarios/' . $value->idusr, 'class' => 'pull-right m-xs btn_delete_user')) }}

                                        <div class="btn-group btn-group-md" role="group">

                                        {{ Form::hidden('_method', 'DELETE') }}

                                        <a class="btn btn-md btn-default" href="{{ URL::route('usuarios.clave', ['id' => $value->idusr ]) }}"><i class="fa fa-key" aria-hidden="true"></i></a>

                                        <a class="btn btn-md btn-default" href="{{ URL::route('usuarios.edit', ['id' => $value->idusr ]) }}"><i class="fa fa-pencil grey" aria-hidden="true"></i></a>

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