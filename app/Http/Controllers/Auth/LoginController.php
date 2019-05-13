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
        if(auth()->user()->hasRole('superadmin')){
            return redirect('/superadmin');
        }elseif(auth()->user()->hasRole('admin')){
            return redirect('/admin');
        }elseif(auth()->user()->hasRole('auditor')){
            return redirect('/auditor');
        }elseif(auth()->user()->hasRole('empresa')){
            return redirect('/empresa');
        }elseif(auth()->user()->hasRole('experto')){
            return redirect('/experto');
        }elseif(auth()->user()->hasRole('generico')){
            /*if(auth()->user()->hasRole('istas')){
                    return redirect('/istas');
            }elseif(auth()->user()->hasRole('cphs')){
                    return redirect('/cphs');
            }else{
                    
            }*/
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
