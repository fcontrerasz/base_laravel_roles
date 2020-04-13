@extends('layouts.app')
 
@section('content')

            <div class="row m-t-md">
                <div class="col-md-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Gráfico 1</h5>
                        </div>
                        <div class="ibox-content p-md">
                            {!! $chart->container() !!}
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Gráfico 2</h5>
                        </div>
                        <div class="ibox-content p-md">
                            {!! $line->container() !!}
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Gráfico 3</h5>
                        </div>
                        <div class="ibox-content p-md">
                            {!! $bar->container() !!}
                        </div>

                    </div>
                </div>    
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Gráfico 3</h5>
                        </div>
                        <div class="ibox-content p-md">
                            
                        </div>

                    </div>
                </div>   
            </div>

            

            

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset=utf-8></script>
        
 
        {!! $chart->script() !!}
        {!! $bar->script() !!}
        {!! $line->script() !!}
 
    

@endsection