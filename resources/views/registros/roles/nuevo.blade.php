@extends('layouts.admin')

@section('breadcrumbs')
    <h2>{{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title" : '' }}</h2>
        {{ Breadcrumbs::render('roles.crear') }}
@endsection


@section('content')


    <div class="row border-bottom ">
        <div class="col-md-12 p-sm">

            <div class="ibox float-e-margins">

                    <div class="ibox-content">
                        
                        <div class="row m-b-sm m-t-sm">

                            <div class="col-md-12">

        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
                <div class="alert alert-{{ $msg }}">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session($msg) }}
                </div>
            @endif
        @endforeach

        {!! Form::open(['method' => 'POST', 'route' => ['roles.guardar'], 'class'=>'form-horizontal']) !!}

 <div class="row">
         <div class="col-sm-4">
             
            <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                {!! Form::label('name', 'Nombre *', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('name'))
                        <span class="has-error">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
            </div>


         </div>
        <div class="col-sm-4">
            
            <div class="form-group {{ ($errors->has('permission'))?'has-error':'' }}">
                {!! Form::label('permission', 'Permisos *', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('permission[]', $permissions, old('permission'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    @if($errors->has('permission'))
                        <span class="has-error">
                            {{ $errors->first('permission') }}
                        </span>
                    @endif
                </div>
            </div>

        </div>
         <div class="col-sm-4"></div>
    </div>

    <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
                </div>
    </div>
    

    {!! Form::close() !!}

                            </div>


                        </div>

                    </div>
                </div>



            
        </div>
    </div>



@endsection




