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
@endsection