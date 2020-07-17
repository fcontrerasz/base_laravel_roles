<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpertoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:experto');
    }

    public function index(Request $request)
    {
    	 $request->user()->authorizeRoles(['Super', 'Administrador','Experto']);
        return view('experto');
    }
}
