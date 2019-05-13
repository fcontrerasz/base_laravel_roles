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
    	 $request->user()->authorizeRoles(['superadmin', 'admin','auditor']);
        return view('auditor');
    }
}
