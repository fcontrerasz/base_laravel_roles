@extends('layouts.adminvue')

@section('breadcrumbs')

@endsection
 
@section('content')
     <index :usuario="'{{ json_encode(auth()->user()) }}'"></index>
@endsection

@section('scripts')
    <script src="js/plugins/chartJs/Chart.min.js"></script>
    <script src="js/demo/chartjs-demo.js"></script>
@endsection