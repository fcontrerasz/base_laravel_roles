<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('role:empresa');
    }

    public function index(Request $request)
    {
    	 $request->user()->authorizeRoles(['superadmin', 'admin','empresa','auditor']);
        return view('empresa');
    }
}
