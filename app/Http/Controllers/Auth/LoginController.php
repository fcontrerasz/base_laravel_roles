<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/inicio';

    public function authenticated()
    {
      // dd("1");
        if(auth()->user()->hasRole('Super')){
            return redirect('/superadmin');
        }elseif(auth()->user()->hasRole('Administrador')){
            return redirect('/admin');
        }elseif(auth()->user()->hasRole('Auditor')){
            return redirect('/auditor');
        }elseif(auth()->user()->hasRole('Experto')){
            return redirect('/empresa');
        }elseif(auth()->user()->hasRole('Empresa')){
            return redirect('/experto');
        }elseif(auth()->user()->hasRole('Generico')){
            return redirect('/panel');
        } return redirect('/inicio');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*public function username()
    {
        return 'test';
    }
    
     

    public function authenticate()
    {
        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            // Authentication passed...
           // dd("111");
            //return redirect()->intended('dashboard');
        }
    }*/
    
    

}
