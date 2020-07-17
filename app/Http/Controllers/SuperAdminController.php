<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:superadmin');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Super']);
        return view('super');
    }
}
