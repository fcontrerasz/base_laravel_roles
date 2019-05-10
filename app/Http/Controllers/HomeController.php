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
        // return view('home');
        $request->user()->authorizeRoles(['usuario', 'admin']);
        

        if($request->user()->hasRole('admin')){
            return view('admin');
        }elseif($request->user()->hasRole('superadmin')){
            return view('super');
        }else return view('home');
        //return ;
    }
}
