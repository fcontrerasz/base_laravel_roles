<meta name="csrf-token" content="{{ csrf_token() }}">
<?php
    use \koolreport\datagrid\DataTables;
    use \koolreport\core\Utility as Util;
    use \koolreport\inputs\Select2;
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\inputs\TextBox;
?>

@extends('layouts.admin')

@section('content')

 <div class="row border-bottom white-bg">
        <div class="col-md-12">

            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Listado de Usuarios App Móvil</h5>
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

                        <div class="row m-b-sm m-t-sm">

                                <div class="col-md-12">

                                <div class="dt-buttons btn-group pull-right">
                                
                                <a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>Excel</span>
                                </a>
                                <a class="hide btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0"><span>PDF</span></a>
                                <a class="hide btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0"><span>Imprimir</span></a>
                                 <a class="btn btn-primary" href="{{ URL::to('usuariosapp/create') }}">Nuevo Usuario</a>
                                </div>

                                </div>
                            </div>
                        
                        <div class="table-responsive">
                    <table class="table table-hover small ">
                        <thead>
                            <tr>
                                <td>@sortablelink('IDUSU','ID')</td>
                                <td>USUARIO</td>
                                <td>NOMBRE</td>
                                <td>CORREO</td>
                                <td style="width: 50px">ACCION</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($nerds as $key => $value)
                            <tr>
                                <td>{{ $value->IDUSU }}</td>
                                <td>{{ $value->USUARIO }}</td>
                                <td>{{ $value->NOMBRE }}</td>
                                <td>{{ $value->CORREO }}</td>
                                <td>


                           

                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                                    <div class="btn-group">

                                    <a class="btn btn-sm btn-info" href="{{ URL::to('usuariosapp/' . $value->IDUSU . '/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                    </div>

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
