@extends('layouts.admin')



@section('breadcrumbs')
    <h2>Configuración</h2>
    {{ Breadcrumbs::render('configuracion.listar') }}
@endsection

@section('content')


    <div class="row border-bottom ">
        <div class="col-md-12 p-sm">

            <div class="ibox float-e-margins">

                    <div class="ibox-content">
                        
                        <div class="row m-b-sm m-t-sm">

                            <div class="col-md-12">

                                    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            <span class="sr-only">Cerrar</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
    </div>
    @endif

    @can('configuracion.listar')
                            @include('app_settings::_settings')
    @else

    <h4>No tienes permisos</h4>
            

    @endcan                            

                            </div>


                        </div>

                    </div>
                </div>



            
        </div>
    </div>



@endsection