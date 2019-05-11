<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;


class AdminController extends Controller
{
    //
    
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
        //$request->user()->hasRole('admin'));
        
        //$this->middleware('Role:ROLE_ADMIN');
    }

    public function index()
    {
        return view('admin');
    }

}
