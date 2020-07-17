<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Auth;


class AdminController extends Controller
{
    //
    
	public function __construct()
    {
        $this->middleware('auth');
       //$this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Super', 'Administrador']);
        return view('admin');
    }

}
