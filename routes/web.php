<?php
use Illuminate\Routing\UrlGenerator;



Route::get('/', function () {
    if(auth()->user()){
        if(auth()->user()->hasRole('superadmin')){
            return redirect('/superadmin');
        }elseif(auth()->user()->hasRole('admin')){
            return redirect('/admin');
        }elseif(auth()->user()->hasRole('auditor')){
            return redirect('/auditor');
        }elseif(auth()->user()->hasRole('experto')){
            return redirect('/experto');
        }elseif(auth()->user()->hasRole('empresa')){
            return redirect('/empresa');
        }elseif(auth()->user()->hasRole('generico')){
            return redirect('/panel');
        } return abort(500);
   }else return view('auth.login');
});

//Auth::routes(['verify' => true]);

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/inicio', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){ 
    Route::get('/cambiarpass','UsuariosWebController@claveForm');
    Route::post('/cambiarpass','UsuariosWebController@cambiarClave')->name('changePassword');
    Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin');
    Route::get('/admin', 'AdminController@index')->name('admin');
}); 


Route::group(['middleware' => 'role:admin|superadmin'],function(){
    Route::resource('admin/usuarios', 'UsuariosWebController');
    Route::get('admin/exportar_usuarios', 'UsuariosWebController@exportar')->name('usuarios.exportar');
    Route::get('dinamico_usuarios/traer', 'UsuariosWebController@postSearch')->name('usuarios.fetch');
    Route::get('admin/usuarios/clave/{id}', 'UsuariosWebController@clave')->name('usuarios.clave');
    Route::post('/actualizaclave/{id}','UsuariosWebController@actualizaclave')->name('actualizaclave');
});


/* ** testing * */


Route::get('generate-pdf','GenerarPDFController@generatePDF');
Route::get('email-test', function(){
    $details['email'] = 'fcontrerasz@gmail.com';
    dispatch(new App\Jobs\SendEmailJob($details));
    dd('done');
});


Route::get('/encuestas/{encuesta}/aplicar', function ($encuesta) {
    dd($encuesta);
})->name('encuestas.aplicar_encuesta')->middleware('signed');

Route::get('/trae_encuesta', function () {
    $ruta = URL::signedRoute('encuestas.aplicar_encuesta', ['encuesta' => 1]);
    dd($ruta);
})->name('encuestas');