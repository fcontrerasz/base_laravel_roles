<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:auditor');
    }

    public function index(Request $request)
    {

        //$user = auth()->user()->getAllPermissions();
        //$user
        //dd($user);
    	 $request->user()->authorizeRoles(['Super', 'Administrador','Auditor']);
        return view('auditor');
    }
}
