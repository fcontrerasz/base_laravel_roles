@extends('layouts.admin')

@section('breadcrumbs')
    <h2>{{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title" : '' }}</h2>
    {{ Breadcrumbs::render('campos.crear') }}
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

                            {!! form_start($form) !!}

 <div class="row">
         <div class="col-sm-4">{!! form_row($form->idtcamp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->campo_descripcion) !!}</div>
         <div class="col-sm-4">{!! form_row($form->campo_titulo) !!}</div>
    </div>
     <div class="row">
        <div class="col-sm-4">{!! form_row($form->campo_valores) !!}</div>


    </div>
    

    {!! form_end($form) !!}

                            </div>


                        </div>

                    </div>
                </div>



            
        </div>
    </div>



@endsection