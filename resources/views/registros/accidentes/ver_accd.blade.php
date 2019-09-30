
@extends('layouts.app')

@php
   //dd($form);
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Mostrando #{!! form_row($form->EMPRESA) !!} </div>

                <div class="card-body">
                    <h3>Mostrando {!! form_row($form->EMPRESA) !!}</h3>
                    <h3>{!! form_row($form->GRUPO) !!}</h3>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection