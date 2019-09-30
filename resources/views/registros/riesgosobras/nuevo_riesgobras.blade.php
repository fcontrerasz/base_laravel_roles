@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Tasas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('empresa') }}">Inicio</a>
            </li>
            <li class="active">
                <strong>Reporte Estadístico Mensual</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

        <div class="row m-t-md">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="ibox">
                                <div class="ibox-title">
                            <h5>Reporte Estadístico Mensual</h5>

                        </div>
                                <div class="ibox-content small">


                   

    {!! form_start($form) !!}


    <div class="row">
            <div class="col-sm-3">{!! form_row($form->riob_origin) !!}</div>
            <div class="col-sm-3">{!! form_row($form->riob_ano) !!}</div>
            <div class="col-sm-3">{!! form_row($form->riob_mes) !!}</div>
            <div class="col-sm-3">{!! form_row($form->riob_fechadetec) !!}</div>
        </div>
   

       <div class="ibox-content ibox-heading">
        <h4>El reporte corresponde a una acción de:</h4>
    </div>
    <div class="ibox-content">                            
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->riob_adv) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_eva) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_otro) !!}</div>
        </div>
    </div>


    <div class="ibox-content ibox-heading">
        <h4>El reporte de riesgo esta relacionado con</h4>
    </div>
    <div class="ibox-content">                            
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->riob_preg1) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_preg2) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_preg3) !!}</div>
        </div>
                <div class="row">
            <div class="col-sm-4">{!! form_row($form->riob_preg4) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_preg5) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_preg6) !!}</div>
        </div>
                <div class="row">
            <div class="col-sm-4">{!! form_row($form->riob_preg7) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_preg8) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_preg9) !!}</div>
        </div>
                <div class="row">
            <div class="col-sm-4">{!! form_row($form->riob_preg10) !!}</div>
            <div class="col-sm-4">{!! form_row($form->riob_preg11) !!}</div>
            <div class="col-sm-4"></div>
        </div>
    </div>

       

    {!! form_end($form) !!}

            

                                </div>
                            </div>
                        </div>
                    </div>


@endsection