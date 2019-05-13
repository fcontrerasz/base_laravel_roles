<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenericoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
     //   $this->middleware('role:generico');
    }

    public function index()
    {
        return view('home');
    }
}
