@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Nuevo Ingreso</div>

                <div class="card-body">
                {{--    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif --}}

	{!! form_start($form) !!}
	{{-- {{ $errors }} --}}

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->GRUPO) !!}  
            {!! form_errors($form->GRUPO) !!}
        </div>
        <div class="col-sm-3">{!! form_row($form->EMPRESA) !!}</div>
        <div class="col-sm-3">{!! form_row($form->MES) !!}  </div>
        <div class="col-sm-3">{!! form_row($form->ANO) !!}</div>
    </div>
    <h2 class="text-divider"><span>Datos Estadísticos</span></h2>

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->Q_TPERDIDO) !!}  </div>
        <div class="col-sm-4">{!! form_row($form->Q_SPERDIDO) !!}</div>
        <div class="col-sm-4">{!! form_row($form->N_HORAS) !!}  </div>
    </div>

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->N_XTRAB) !!}</div>
        <div class="col-sm-4">{!! form_row($form->Q_DIASCTIEMPO) !!}</div>
    </div>



	{{-- {!! form_rest($form) !!} --}}
	{!! form_end($form) !!}

            </div>
        </div>
    </div>
</div>
@endsection