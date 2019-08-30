@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Nuevo Ingreso</div>
                <div class="card-body">
                   

	{!! form_start($form) !!}

 <div class="row">
         <div class="col-sm-4">{!! form_row($form->USUARIO) !!}</div>
        <div class="col-sm-4">{!! form_row($form->NOMBRE) !!}</div>
         <div class="col-sm-4">{!! form_row($form->CORREO) !!}</div>
    </div>

     <div class="row">
         <div class="col-sm-4">{!! form_row($form->CLAVE) !!}</div>
    </div>

    {!! form_end($form) !!}

            </div>
        </div>
    </div>
</div>
@endsection