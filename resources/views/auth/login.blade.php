@extends('layouts.portada')

@section('content')
<div class="loginColumns animated fadeInDown">


        <div>
            <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="ibox-content">
                    <div class="navy-bg m-b-md">

                <h3 class="logo-name no-padding no-margins text-center" style="font-size: 10px !important;"><img class="img-lg" src="img/logo.png" /></h3>

            </div>
            <form method="POST" action="{{ route('login') }}"  >
                @csrf

                <div class="form-group">
                    <input id="email" type="text" placeholder="Correo" autocomplete="off" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group">
                    <input id="password" type="password" placeholder="Clave" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group row hide">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary block full-width m-b">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                                
            </form>
            </div>
             </div>
         </div>
            <center><p class="m-t"> <small>Patache &copy; 2019</small> </p></center>
        </div>
    </div>

@endsection
