<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(auth()->user()){
    	if(auth()->user()->hasRole('superadmin')){
            return redirect('/superadmin');
        }elseif(auth()->user()->hasRole('admin')){
            return redirect('/admin');
        }elseif(auth()->user()->hasRole('auditor')){
            return redirect('/auditor');
        }elseif(auth()->user()->hasRole('contratista')){
            return redirect('/contratista');
        }elseif(auth()->user()->hasRole('ito')){
            return redirect('/ito');
        }elseif(auth()->user()->hasRole('generico')){
            return redirect('/panel');
        } return abort(500);
    }else return view('auth.login');
});


Route::get('/cambiarpass','UsuariosWebController@claveForm');
Route::post('/cambiarpass','UsuariosWebController@cambiarClave')->name('changePassword');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
//Auth::routes();

Route::get('/inicio', 'HomeController@index')->name('home');
Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/auditor', 'AuditorController@index')->name('auditor');
Route::get('/empresa', 'EmpresaController@index')->name('empresa');
Route::get('/experto', 'ExpertoController@index')->name('experto');
Route::get('/panel', 'GenericoController@index')->name('panel');

Route::get('/usuariosweb/exportar', 'UsuariosWebController@exportar')->name('usuariosweb.exportar');
//Route::get('/usuariosweb/create', 'UsuariosWebController@create')->name('usuariosweb.create');
Route::resource('usuariosweb', 'UsuariosWebController')->middleware('auth');

