@extends('layouts.admin')
@section('content')

@php
    //dd($form)
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modificar Registro #{{ $id }}</div>

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