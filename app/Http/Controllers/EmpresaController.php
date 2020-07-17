<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth','verified']);
        $this->middleware('dardealta:empresa');
    }

    public function index(Request $request)
    {
    	$request->user()->authorizeRoles(['Super', 'Administrador','Empresa','Auditor']);
        return view('empresa');
    }


}
