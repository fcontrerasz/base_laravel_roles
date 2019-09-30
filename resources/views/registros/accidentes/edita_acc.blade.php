@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Modificar Registro #{{ $id }}</div>

                <div class="card-body">

    {!! form_start($form) !!}
    <div class="row">
        <div class="col-sm-6">{!! form_row($form->GRUPO) !!}  </div>
        <div class="col-sm-6">{!! form_row($form->EMPRESA) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-6">{!! form_row($form->MES) !!}  </div>
        <div class="col-sm-6">{!! form_row($form->ANO) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-6">{!! form_row($form->Q_TPERDIDO) !!}  </div>
        <div class="col-sm-6">{!! form_row($form->Q_SPERDIDO) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->N_HORAS) !!}  </div>
        <div class="col-sm-4">{!! form_row($form->N_XTRAB) !!}</div>
        <div class="col-sm-4">{!! form_row($form->Q_DIASCTIEMPO) !!}</div>
    </div>
 
    {!! form_end($form) !!}
            </div>
        </div>
    </div>
</div>
@endsection