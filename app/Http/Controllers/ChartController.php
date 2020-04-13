<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use DB;

class ChartController extends Controller
{
    public function index()
    {

    	$products = DB::table("usuarios")->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();

      
       // dd($data);
    	//dd($products);

      /*  $chart = new Charts;
        $chart->dataset('Q de Usuarios', 'bar', $products);
        $chart->labels(['2 days ago']);
        $chart->groupByMonth(date('Y'), true);
		$chart->options([
                    'fill' => 'true',
                    'borderColor' => '#51C1C0'
                ]);*/

      //  dd($data->values());

        $chart = new Charts;
        $chart->labels(['Income','Spend']);
        $chart->minimalist(true);
		$chart->dataset('Income & Expenditure', 'doughnut',[90, 10]);
        $chart->options([]);
		$chart->height(150);

        $bar = new Charts;
        $bar->labels(['barra 1','Barra 2']);
        $bar->minimalist(true);
		$bar->dataset('data', 'bar',[90, 10])
		->options([
			'borderColor' => 'black',
			'spanGaps' => false,
			'backgroundColor' => ['#00FFFF','#fff000']
		]);
		$bar->width(150);

        $line = new Charts;
        $line->labels(['linea 1','Linea 2']);
        $line->minimalist(false);
		$line->dataset('data2', 'line',[90, 10, 20, -3, 15, 25])
		->options([
			'borderColor' => 'black',
			'spanGaps' => true,
			'backgroundColor' => ['#00FFFF','#fff000','#fff000','#fff000','#fff000','#fff000']
		]);
		$line->width(150);

       // dd( $chartx);

       /* $chart = Charts::database($products, 'bar', 'highcharts')
			      ->title("Q de Inspecciones")
			      ->elementLabel("Total Inspecciones")
			      ->dimensions(1000, 500)
			      ->responsive(true)
			      ->groupByMonth(date('Y'), true);*/
 	
 

        return view('auditor.informe',compact('chart','line','bar'));
    }
}
