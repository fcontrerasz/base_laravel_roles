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


//ChartController

//Route::get('graficos', 'ChartController@index')->name('chart.index');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/inicio', 'HomeController@index')->name('home');

Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/auditor', 'AuditorController@index')->name('auditor');
Route::get('/empresa', 'EmpresaController@index')->name('empresa');
Route::get('/experto', 'ExpertoController@index')->name('experto');
Route::get('/panel', 'GenericoController@index')->name('panel');

Route::group(['middleware'=>'auth'],function(){ 
    Route::get('/cambiarpass','UsuariosWebController@claveForm');
    Route::post('/cambiarpass','UsuariosWebController@cambiarClave')->name('changePassword');
    Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin');
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/formulariodealta', 'AltaController@alta')->name('frm_alta');
    Route::resource('formulariodealta', 'AltaController')->middleware('auth');
}); 

Route::group(['middleware' => 'role:auditor|admin|superadmin'],function(){
    Route::get('auditor/informe', 'ChartController@index')->name('chart.index');
});


Route::group(['middleware' => 'role:admin|superadmin'],function(){
    Route::resource('admin/usuarios', 'UsuariosWebController');
    Route::resource('admin/empresas', 'EmpresasWebController');
    Route::resource('admin/campos', 'CamposController');
    //Route::get('admin/create-table', 'TableController@operate');
    Route::get('admin/exportar_usuarios', 'UsuariosWebController@exportar')->name('usuarios.exportar');
    Route::get('admin/exportar_empresas', 'EmpresasWebController@exportar')->name('empresas.exportar');
    Route::get('admin/exportar_campos', 'EmpresasWebController@exportar')->name('campos.exportar');
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