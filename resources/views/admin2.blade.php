@extends('layouts.admin')

@section('breadcrumbs')
    <h2>{{ ($breadcrumb = Breadcrumbs::current()) ? "$breadcrumb->title" : '' }}</h2>
    @if($breadcrumb->title != 'Inicio')
     {{ Breadcrumbs::render('inicio') }}
    @endif
@endsection
 
@section('content')
     <index :usuario="'{{ json_encode(auth()->user()) }}'"></index>
@endsection

@section('scripts')
    <script src="js/plugins/chartJs/Chart.min.js"></script>
    <script src="js/demo/chartjs-demo.js"></script>
@endsection