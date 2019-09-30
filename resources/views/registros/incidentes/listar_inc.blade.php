@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Registros de Accidente(s)
                    <a class="btn btn-secondary navbar-btn pull-right" href="{{ URL::to('incidentes/create') }}">Nuevo Accidente</a>
                </div>

                <div class="card-body">

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
</div>
@endsection
