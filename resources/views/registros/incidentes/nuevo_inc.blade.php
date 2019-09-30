@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Incidentes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('empresa') }}">Inicio</a>
            </li>
            <li class="active">
                <strong>Reporte de Incidentes</strong>
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
                            <h5>Nuevo Incidente</h5>

                        </div>
                                <div class="ibox-content small">


                   

    {!! form_start($form) !!}
    <div class="row">
        <div class="col-sm-6">{!! form_row($form->inci_rutempresa) !!}  
            {!! form_errors($form->inci_rutempresa) !!}
        </div>
        <div class="col-sm-6">{!! form_row($form->inci_nomempresa) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->inci_fechaacc) !!}  </div>
        <div class="col-sm-4">{!! form_row($form->inci_fechapres) !!}</div>
        <div class="col-sm-4">{!! form_row($form->inci_fechaalta) !!}</div>
    </div>
    <h2 class="text-divider"><span>Datos del Paciente</span></h2>


    <div class="row">
        <div class="col-sm-3">{!! form_row($form->inci_rutpac) !!}  </div>
        
    </div>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->inci_nompac) !!}</div>
        <div class="col-sm-4">{!! form_row($form->inci_patpac) !!}</div>
        <div class="col-sm-4">{!! form_row($form->inci_matpac) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->inci_genero) !!}  </div>
        <div class="col-sm-4">{!! form_row($form->inci_edad) !!}</div>
    </div>

    <h2 class="text-divider"><span>Identificación del Caso</span></h2>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->inci_gerencia) !!}</div>
        <div class="col-sm-4">{!! form_row($form->inci_subgerencia) !!}</div>
        <div class="col-sm-4">{!! form_row($form->inci_clasifi) !!}  </div>
    </div>
    <div class="row">

        <div class="col-sm-6">{!! form_row($form->inci_tipolo) !!}</div>
    </div>
    <h2 class="text-divider"><span>Registro del Accidente</span></h2>
    <div class="row">
        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-12">{!! form_row($form->inci_parteles) !!}</div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="row">
                <div class="col-sm-4">{!! form_row($form->inci_diasem) !!}  </div>
                <div class="col-sm-4">{!! form_row($form->inci_hora) !!}</div>
                <div class="col-sm-4">{!! form_row($form->inci_dp) !!}  </div>
            </div>
            <div class="row">
                <div class="col-sm-6">{!! form_row($form->inci_consin) !!}</div>
                <div class="col-sm-6">{!! form_row($form->inci_agente) !!}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">{!! form_row($form->inci_glosa) !!}</div>
    </div>
            

    {!! form_end($form) !!}

            

                                </div>
                            </div>
                        </div>
                    </div>


@endsection