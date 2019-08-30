@extends('layouts.nulo')

@section('content')
<div class="container app">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" >
<h2>{{ $exception->getMessage() }}</h2>
            </div>
        </div>
    </div>
@endsection