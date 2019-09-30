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
                            <h5>Registros de Tasa(s)</h5>

                        </div>
                                <div class="ibox-content small">


                   

    <div class="table-responsive">
                    <table class="table table-hover small ">
                        <thead>
                            <tr>
                                <td>@sortablelink('idinci','ID')</td>
                                <td>@sortablelink('inci_nomempresa','EMPRESA')</td>
                                <td>@sortablelink('inci_fechaacc','FECHA ACCIDENTE')</td>
                                <td>CLASIF</td>
                                <td>TIPO</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($nerds as $key => $value)
                            <tr>
                                <td>{{ $value->idinci }}</td>
                                <td>{{ $value->inci_nomempresa }}</td>
                                <td>{{ $value->inci_fechaacc }}</td>
                                <td>{{ $value->inci_clasifi }}</td>
                                <td>{{ $value->inci_tipolo }}</td>
                                <td>

                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                    <!-- we will add this later since its a little more complicated than the other two buttons -->
                                    {{ Form::open(array('url' => 'inc/' . $value->idinci, 'class' => 'pull-right m-xs')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit', 'onclick' => 'return confirm("¿Está seguro, no habrá vuelta atrás.?")']) }}
                                    {{ Form::close() }}

                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                    <a class="btn btn-sm btn-success pull-right m-xs" href="{{ URL::to('inc/' . $value->idinci) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                    <a class="btn btn-sm btn-info pull-right m-xs" href="{{ URL::to('inc/' . $value->idinci . '/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $nerds->appends(request()->except('page'))->render() !!}
                </div>

            

                                </div>
                            </div>
                        </div>
                    </div>



@endsection
