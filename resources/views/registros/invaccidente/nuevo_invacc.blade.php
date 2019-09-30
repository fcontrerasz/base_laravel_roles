@extends('layouts.app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Investigación Accidentes</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('empresa') }}">Inicio</a>
            </li>
            <li class="active">
                <strong>Reporte</strong>
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
                            <h5>Registro Investigación Accidentes</h5>

                        </div>
                                <div class="ibox-content small">


                   

    {!! form_start($form) !!}
   

    <h2 class="text-divider"><span>I. ANTECEDENTES DEL TRABAJADOR ACCIDENTADO</span></h2>  


       <div class="row">
        
        <div class="col-sm-2">{!! form_row($form->invacc_rut) !!}</div>
        <div class="col-sm-6">{!! form_row($form->invacc_nombrecompleto) !!}</div>
        <div class="col-sm-2">{!! form_row($form->invacc_edad) !!}  </div>
        <div class="col-sm-2">{!! form_row($form->invacc_sexo) !!}</div>
    </div>
    
    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_cargo) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_antiguedad) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_jornadalaboral) !!}</div>
    </div>


    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_empresa) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_estudios) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_capacitaciones) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_areaunidad) !!}</div>
    </div>
    
        <h2 class="text-divider"><span>II. ANTECEDENTES DEL ACCIDENTE /INCIDENTE</span></h2>    

            <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_fechaacc) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_horaacc) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_lugaracc) !!}</div>
    </div>

        <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_diaacc) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_horaing) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_nhhtrab) !!}</div>
    </div>

            <h2 class="text-divider"><span>III. CLASIFICACION DEL INCCIDENTE</span></h2>    

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_accgrave) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_accfatal) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_graveyfatal) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_accctp) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_fallaoper) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_accaltopotencial) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_acctrayecto) !!}</div>
    </div>

    <h2 class="text-divider"><span>IV. PRIMEROS AUXILIOS</span></h2>    

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_reqmaniobrasresca) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_reqprimerosaux) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_nombrequienreq) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_reqfecha) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_reqhora) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_reqfuetrasl) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_reqatenrecib) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_reqmediotras) !!}</div>
    </div>

    <h2 class="text-divider"><span>V. PARTE DEL CUERPO AFECTADA</span></h2>    

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_zonalesionada) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_cabeza) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_miemsuper) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_mieminfer) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_espalda) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_todoelcuerpo) !!}</div>
    </div>


    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_torso) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_cuellomedula) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_otraspartes) !!}</div>
    </div>

    <h2 class="text-divider"><span>NATURALEZA DE LA LESION</span></h2>    

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_perfora) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_herida) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_shock) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_quemadura) !!}</div>
    </div>
    
    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_fractura) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_contusion) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_torcedura) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_luxacion) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_desgarro) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_lumbago) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_dolor) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_ojos) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_cuerpoextra) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_otralesion) !!}</div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3"></div>
    </div>

    <h2 class="text-divider"><span>V. PARTE DEL CUERPO AFECTADA</span></h2>    

    <div class="row">
        <div class="col-sm-12">{!! form_row($form->invacc_parteafectada) !!}</div>
    </div>

    <h2 class="text-divider"><span>VI. INCUMPLIMIENTO DE REGLAS QUE SALVAN VIDAS</span></h2>    

    <div class="row">
        <div class="col-sm-12">{!! form_row($form->invacc_rqs) !!}</div>
    </div>

    <h2 class="text-divider"><span>VII. TESTIGOS</span></h2>    

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_testigo1_nombre) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_testigo1_rut) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_testigo1_cargo) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_testigo1_telefono) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-12">{!! form_row($form->invacc_testigo1_evidencia) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_testigo2_nombre) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_testigo2_rut) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_testigo2_cargo) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_testigo2_telefono) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-12">{!! form_row($form->invacc_testigo2_evidencia) !!}</div>
    </div>

    <h2 class="text-divider"><span>VIII. Descripcion de los Hechos</span></h2>    

    <div class="row">
        <div class="col-sm-3">{!! form_row($form->invacc_descripcionhechos) !!}</div>
        <div class="col-sm-3">{!! form_row($form->invacc_hechosevidencia) !!}</div>
    </div>

        <h2 class="text-divider"><span>IX. ANALISIS DE CAUSA</span></h2>    

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_cauinm_condfueranorma) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_cauinm_accfueranorma) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_cauinm_terceros) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_caubas_facpersonal) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_caubas_factrab) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_caubas_factexter) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-6">{!! form_row($form->invacc_grav_potencial) !!}</div>
        <div class="col-sm-6">{!! form_row($form->invacc_proba_ocurren) !!}</div>
    </div>

            <h2 class="text-divider"><span>X. TIPO DE ACCIDENTE/INCIDENTE</span></h2>    

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_tipoacc_tipo1) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_tipoacc_tipo2) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_tipoacc_tipo3) !!}</div>
    </div>


            <h2 class="text-divider"><span>XII. MEDIDAS DE CONTROL</span></h2>    

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_med1) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med1_resp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med1_fecha) !!}</div>
    </div>

        <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_med2) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med2_resp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med2_fecha) !!}</div>
    </div>

        <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_med3) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med3_resp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med3_fecha) !!}</div>
    </div>

        <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_med4) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med4_resp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med4_fecha) !!}</div>
    </div>

        <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_med5) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med5_resp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med5_fecha) !!}</div>
    </div>

        <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_med6) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med6_resp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_med6_fecha) !!}</div>
    </div>


                <h2 class="text-divider"><span>XIII. COMISION INVESTIGADORA</span></h2>    

    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_comision1_cargo) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision1_nombrecomp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision1_firma) !!}</div>
    </div>


    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_comision2_cargo) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision2_nombrecomp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision2_firma) !!}</div>
    </div>


    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_comision3_cargo) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision3_nombrecomp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision3_firma) !!}</div>
    </div>


    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_comision4_cargo) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision4_nombrecomp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision4_firma) !!}</div>
    </div>


    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_comision5_cargo) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision5_nombrecomp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision5_firma) !!}</div>
    </div>


    <div class="row">
        <div class="col-sm-4">{!! form_row($form->invacc_comision6_cargo) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision6_nombrecomp) !!}</div>
        <div class="col-sm-4">{!! form_row($form->invacc_comision6_firma) !!}</div>
    </div>


    <h2 class="text-divider"><span>XIV. FIRMA TRABAJADOR INVOLUCRADO</span></h2>    

    <div class="row">
        <div class="col-sm-6">{!! form_row($form->invacc_trab1_nombre) !!}</div>
        <div class="col-sm-6">{!! form_row($form->invacc_trab1_firma) !!}</div>
    </div>

    <div class="row">
        <div class="col-sm-6">{!! form_row($form->invacc_trab2_nombre) !!}</div>
        <div class="col-sm-6">{!! form_row($form->invacc_trab2_firma) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-6">{!! form_row($form->invacc_trab3_nombre) !!}</div>
        <div class="col-sm-6">{!! form_row($form->invacc_trab3_firma) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-6">{!! form_row($form->invacc_trab4_nombre) !!}</div>
        <div class="col-sm-6">{!! form_row($form->invacc_trab4_firma) !!}</div>
    </div>
    <div class="row">
        <div class="col-sm-6">{!! form_row($form->invacc_trab5_nombre) !!}</div>
        <div class="col-sm-6">{!! form_row($form->invacc_trab5_firma) !!}</div>
    </div>


    {!! form_end($form) !!}

            

                                </div>
                            </div>
                        </div>
                    </div>


@endsection