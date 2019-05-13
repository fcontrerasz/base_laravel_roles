<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        // dd($request->user());
        // return view('home');
        if($request->user()->hasRole('admin')){
            return view('admin');
        }elseif($request->user()->hasRole('superadmin')){
            return view('super');
        }elseif($request->user()->hasRole('auditor')){
            return view('auditor');
        }elseif($request->user()->hasRole('experto')){
            return view('experto');
        }elseif($request->user()->hasRole('empresa')){
            return view('empresa');
        }else return redirect('/panel');
        //return ;
    }
}
