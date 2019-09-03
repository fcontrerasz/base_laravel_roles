@extends('layouts.admin')

@section('content')


    <div class="row border-bottom white-bg">
        <div class="col-md-12">

            <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Modificar Registro #{{ $id }}</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
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
         <div class="col-sm-4">{!! form_row($form->name) !!}</div>
        <div class="col-sm-4">{!! form_row($form->email) !!}</div>
         <div class="col-sm-4">{!! form_row($form->username) !!}</div>
    </div>
     <div class="row">
      <div class="col-sm-4">{!! form_row($form->password) !!}</div>
         <div class="col-sm-4">{!! form_row($form->activado) !!}</div>
        <div class="col-sm-4">{!! form_row($form->rol) !!}</div>

    </div>
    

    {!! form_end($form) !!}

                            </div>


                        </div>

                    </div>
                </div>



            
        </div>
    </div>



@endsection