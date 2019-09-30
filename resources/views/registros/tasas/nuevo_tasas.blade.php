@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h4>Tasas</h4>
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
        <div class="col-sm-3">{!! form_row($form->tasa_ano) !!}</div>
        <div class="col-sm-3">{!! form_row($form->tasa_mes) !!}</div>
        <div class="col-sm-3">{!! form_row($form->tasa_tipo_emp) !!}  </div>
        <div class="col-sm-3">{!! form_row($form->tasa_subcontrato) !!}</div>
    </div>

    <div class="ibox-content ibox-heading">
        <h4>1.- Datos de la Empresa</h4>
        <small>Registre a continuación la información de su empresa.</small>
    </div>
    <div class="ibox-content">                            
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_rutcont) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_razoncont) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_contratos) !!}</div>
        </div>
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_quienenvia) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_quienfono) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_quienmail) !!}</div>
        </div>
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_q_serv_desa) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_q_serv_ejec) !!}</div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <div class="ibox-content ibox-heading">
        <h4>2.- Datos de contacto del experto en prevención de riesgos.</h4>
        <small>Registre a continuación.......</small>
    </div>
    <div class="ibox-content">   
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_expnombre) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_expfono) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_expfijo) !!}</div>
        </div>
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_expmail1) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_expmail2) !!}</div>
            <div class="col-sm-4"></div>
        </div>
    </div>

    <div class="ibox-content ibox-heading">
        <h4>3.- Dotación Total de la empresa contratista. N° de trabajadores del mes del reporte por servicio Contratado.</h4>
        <small>Registre a continuación ......</small>
    </div>
    <div class="ibox-content">   
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_qhombres) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_qmujeres) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_qtraba) !!}</div>
        </div>
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_hhteoricos) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_hhextraord) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_q_ctp) !!}</div>
        </div>
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_dp_ctp) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_acc_servicio) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_total_acc) !!}</div>
        </div>
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_total_dias) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_num_trab) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_n_fatales) !!}</div>
        </div>
    </div>

    <div class="ibox-content ibox-heading">
        <h4>4.- Tasa de cotización por la ley de accidentes del trabajo y salud ocupacional. % de las remuneraciones del total de sus trabajadores que cancela para el seguro de accidentes y enfermedades profesionales.</h4>
        <small>Registre a continuación ......</small>
    </div>
    <div class="ibox-content"> 
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_ecoxsine) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_cotvig) !!}</div>
            <div class="col-sm-4"></div>
        </div>
    </div>

    <div class="ibox-content ibox-heading">
        <h4>5.- Datos del certificado de la mutualidad.</h4>
        <small>Registre a continuación ......</small>
    </div>
    <div class="ibox-content"> 
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->tasa_mutualcert) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_archivopdf) !!}</div>
        <div class="col-sm-4"></div>
    </div>
    </div>

    <div class="ibox-content ibox-heading">
        <h4>6.- La empresa contratista y quien informa declara que los datos registrados corresponden fielmente a los datos y registros entregados por su mutualidad en el certificado cargado en plataforma SQ Control Contratistas.</h4>
        <small>Registre a continuación ......</small>
    </div>
    <div class="ibox-content"> 
        <div class="row">
            <div class="col-sm-4">{!! form_row($form->tasa_num_cert) !!}</div>
            <div class="col-sm-4">{!! form_row($form->tasa_fecha_cert) !!}</div>
            <div class="col-sm-4"></div>
        </div>
    </div>

    <div class="ibox-content ibox-heading">
        <h4>7.- Registro mensual de TASAS de accidentabilidad Empresa INFORMADA por su Organismo Administrador.</h4>
        <small>Registre a continuación ......</small>
    </div>
    <div class="ibox-content">    
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->tasa_mensual_mes) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_total_acc) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_total_dias) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->tasa_num_trab) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_ind_frec) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_ind_grav) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->tasa_hh_hombres) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_siniestra_temp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_siniestra_invmuerte) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->tasa_siniestra_total) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_accidentabilidad) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_n_pensionados) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->tasa_n_indemnizados) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_n_fatales) !!}</div>
        <div class="col-sm-4"></div>
    </div>
    </div>

    <div class="ibox-content ibox-heading">
        <h4>8.- La empresa contratista y quien informa declara que los datos registrados corresponden fielmente a los datos y registros entregados por su mutualidad en el certificado cargado en plataforma SQ Control Contratistas.</h4>
        <small>Registre a continuación ......</small>
    </div>
    <div class="ibox-content"> 
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->tasa_num_cert) !!}</div>
        <div class="col-sm-4">{!! form_row($form->tasa_fecha_cert) !!}</div>
        <div class="col-sm-4"></div>
    </div>
    </div>

    {!! form_end($form) !!}

            

                                </div>
                            </div>
                        </div>
                    </div>


@endsection