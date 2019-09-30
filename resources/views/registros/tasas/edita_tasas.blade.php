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
    <h2 class="text-divider"><span>Registro del Incidente</span></h2>
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