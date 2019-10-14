@extends('layouts.app')

@section('content')

<style>

.nav-tabs > li > a{
  color:#676a6c !important;
}


	</style>

<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins m-b-none">
                <div class="ibox-content text-center small">

                    <h2><span class="text-navy">EMPRESAS - Administración de Empresas</span></h2>

                </div>
            </div>
        </div>
    </div>

       <div class="row">
                    <div class="col-lg-3">
                    	<div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-check fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Vigentes </span>
                            <h2 class="font-bold">260</h2>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-minus-circle fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> No Entregado </span>
                            <h2 class="font-bold">26</h2>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget style1 red-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-times fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Vencido </span>
                            <h2 class="font-bold">12</h2>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-exclamation-triangle fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Por Vencer </span>
                            <h2 class="font-bold">12</h2>
                        </div>
                    </div>
                </div>
                    </div>
        </div>

        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content small">
                            <span class="text-muted small pull-right">Actualizado al <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2019</span>
                            <h2>Proyectos</h2>
                            <p>
                                Todos los empleados registrados en plataforma.
                            </p>
                            <div class="input-group">
                                <input type="text" placeholder="Buscar algo..." class="input form-control">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Buscar</button>
                                </span>
                            </div>
                            <div class="clients-list">
                            <ul class="nav nav-tabs">
                                <span class="pull-right small text-muted">1406 Elementos</span>
                                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"><i class="fa fa-user"></i> Trabajador(es)</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false"><i class="fa fa-cog"></i> Maquinaria(s)</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false"><i class="fa fa-briefcase"></i> Contrato(s)</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false"><i class="fa fa-search"></i> Auditoria(s)</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false"><i class="fa fa-thumb-tack"></i> Multa(s)</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false"><i class="fa fa-tasks"></i> Tarea(s)</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="img/a2.jpg"> </td>
                                                    <td><a data-toggle="tab" href="#contact-1" class="client-link" aria-expanded="true">Anthony Jackson</a></td>
                                                    <td> Tellus Institute</td>
                                                    <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                    <td> gravida@reportes.cl</td>
                                                     <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>

                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="img/a2.jpg"> </td>
                                                    <td><a data-toggle="tab" href="#contact-2" class="client-link" aria-expanded="true">Rooney Lindsay</a></td>
                                                    <td>Proin Limited</td>
                                                    <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                    <td> rooney@reportes.cl</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="img/a4.jpg"> </td>
                                                    <td><a data-toggle="tab" href="#contact-3" class="client-link" aria-expanded="true">Lionel Mcmillan</a></td>
                                                    <td>Et Industries</td>
                                                    <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                    <td> +432 955 908</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-default">Inactivo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                                    <td><a data-toggle="tab" href="#contact-4" class="client-link" aria-expanded="true">Edan Randall</a></td>
                                                    <td>Integer Sem Corp.</td>
                                                    <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                    <td> +422 600 213</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-default">Inactivo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                                    <td><a data-toggle="tab" href="#contact-2" class="client-link" aria-expanded="true">Jasper Carson</a></td>
                                                    <td>Mone Industries</td>
                                                    <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                    <td> +400 468 921</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-default">Inactivo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                                    <td><a data-toggle="tab" href="#contact-3" class="client-link" aria-expanded="true">Reuben Pacheco</a></td>
                                                    <td>Magna Associates</td>
                                                    <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                    <td> pacheco@reportes.cl</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-default">Inactivo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                                    <td><a data-toggle="tab" href="#contact-1" class="client-link" aria-expanded="true">Simon Carson</a></td>
                                                    <td>Erat Corp.</td>
                                                    <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                    <td> Simon@reportes.cl</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                                    <td><a data-toggle="tab" href="#contact-2" class="client-link" aria-expanded="true">Rooney Lindsay</a></td>
                                                    <td>Proin Limited</td>
                                                    <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                    <td> rooney@reportes.cl</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a4.jpg"></a> </td>
                                                    <td><a data-toggle="tab" href="#contact-3" class="client-link" aria-expanded="true">Lionel Mcmillan</a></td>
                                                    <td>Et Industries</td>
                                                    <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                    <td> +432 955 908</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="client-avatar"><a href=""><img alt="image" src="img/a2.jpg"></a> </td>
                                                    <td><a data-toggle="tab" href="#contact-4" class="client-link" aria-expanded="true">Edan Randall</a></td>
                                                    <td>Integer Sem Corp.</td>
                                                    <td class="contact-type"><i class="fa fa-phone"> </i></td>
                                                    <td> +422 600 213</td>
                                                    <td class="project-completion">
                                                		<small>Completado: 48%</small>
		                                                <div class="progress progress-mini">
		                                                    <div style="width: 48%;" class="progress-bar"></div>
		                                                </div>
                                        			</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 368.852px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="full-height-scroll" style="overflow: hidden; width: auto; height: 100%;">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-1" class="client-link" aria-expanded="false">Tellus Institute</a></td>
                                                    <td>Rexton</td>
                                                    <td class="project-completion">
                                                <small>Completion with: 48%</small>
                                                <div class="progress progress-mini">
                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                </div>
                                        </td>
                                                    <td><i class="fa fa-flag"></i> Angola</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Velit Industries</a></td>
                                                    <td>Maglie</td>
                                                    <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-3" class="client-link" aria-expanded="false">Art Limited</a></td>
                                                    <td>Sooke</td>
                                                    <td><i class="fa fa-flag"></i> Philippines</td>
                                                    <td class="client-status"></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-1" class="client-link" aria-expanded="false">Tempor Arcu Corp.</a></td>
                                                    <td>Eisden</td>
                                                    <td><i class="fa fa-flag"></i> Korea, North</td>
                                                    <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Penatibus Consulting</a></td>
                                                    <td>Tribogna</td>
                                                    <td><i class="fa fa-flag"></i> Montserrat</td>
                                                    <td class="client-status"></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-3" class="client-link" aria-expanded="false"> Ultrices Incorporated</a></td>
                                                    <td>Basingstoke</td>
                                                    <td><i class="fa fa-flag"></i> Tunisia</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Et Arcu Inc.</a></td>
                                                    <td>Sioux City</td>
                                                    <td><i class="fa fa-flag"></i> Burundi</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-1" class="client-link" aria-expanded="false">Tellus Institute</a></td>
                                                    <td>Rexton</td>
                                                    <td><i class="fa fa-flag"></i> Angola</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Velit Industries</a></td>
                                                    <td>Maglie</td>
                                                    <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                    <td class="client-status"></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-3" class="client-link" aria-expanded="false">Art Limited</a></td>
                                                    <td>Sooke</td>
                                                    <td><i class="fa fa-flag"></i> Philippines</td>
                                                    <td class="client-status"></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-1" class="client-link" aria-expanded="false">Tempor Arcu Corp.</a></td>
                                                    <td>Eisden</td>
                                                    <td><i class="fa fa-flag"></i> Korea, North</td>
                                                    <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Penatibus Consulting</a></td>
                                                    <td>Tribogna</td>
                                                    <td><i class="fa fa-flag"></i> Montserrat</td>
                                                    <td class="client-status"></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-3" class="client-link" aria-expanded="false"> Ultrices Incorporated</a></td>
                                                    <td>Basingstoke</td>
                                                    <td><i class="fa fa-flag"></i> Tunisia</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Et Arcu Inc.</a></td>
                                                    <td>Sioux City</td>
                                                    <td><i class="fa fa-flag"></i> Burundi</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-1" class="client-link" aria-expanded="false">Tellus Institute</a></td>
                                                    <td>Rexton</td>
                                                    <td><i class="fa fa-flag"></i> Angola</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Velit Industries</a></td>
                                                    <td>Maglie</td>
                                                    <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                    <td class="client-status"></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-3" class="client-link" aria-expanded="false">Art Limited</a></td>
                                                    <td>Sooke</td>
                                                    <td><i class="fa fa-flag"></i> Philippines</td>
                                                    <td class="client-status"></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-1" class="client-link" aria-expanded="false">Tempor Arcu Corp.</a></td>
                                                    <td>Eisden</td>
                                                    <td><i class="fa fa-flag"></i> Korea, North</td>
                                                    <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Penatibus Consulting</a></td>
                                                    <td>Tribogna</td>
                                                    <td><i class="fa fa-flag"></i> Montserrat</td>
                                                    <td class="client-status"></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-3" class="client-link" aria-expanded="false"> Ultrices Incorporated</a></td>
                                                    <td>Basingstoke</td>
                                                    <td><i class="fa fa-flag"></i> Tunisia</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                <tr>
                                                    <td><a data-toggle="tab" href="#company-2" class="client-link" aria-expanded="false">Et Arcu Inc.</a></td>
                                                    <td>Sioux City</td>
                                                    <td><i class="fa fa-flag"></i> Burundi</td>
                                                    <td class="client-status"><span class="label label-primary">Activo</span></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


@endsection