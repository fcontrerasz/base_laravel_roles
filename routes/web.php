<?php
use Illuminate\Routing\UrlGenerator;


Route::get('/', function () {
    if(auth()->user()){
      //  dd(auth()->user()->roles);
        if(auth()->user()->hasRole('Super')){
            return redirect('/superadmin');
        }elseif(auth()->user()->hasRole('Administrador')){
            return redirect('/admin');
        }elseif(auth()->user()->hasRole('Auditor')){
            return redirect('/auditor');
        }elseif(auth()->user()->hasRole('Experto')){
            return redirect('/experto');
        }elseif(auth()->user()->hasRole('Empresa')){
            return redirect('/empresa');
        }elseif(auth()->user()->hasRole('Generico')){
            return redirect('/panel');
        } return abort(500);
   }else return view('auth.login');
});

//Auth::routes(['verify' => true]);
Route::group(['middleware' => ['permission:destroy_notes']], function () {
    Route::get('notes/{id}/destroy', 'NotesController@destroy')->name('notes.destroy');
});

//ChartController

//Route::get('graficos', 'ChartController@index')->name('chart.index');
Route::post('api-token', 'AuthController@authenticate');
Route::post('api-me', 'AuthController@getAuthenticatedUser');
Route::post('api-logout', 'AuthController@logout');

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

Route::group(['middleware' => 'role:Auditor|Administrador|Super'],function(){
    Route::get('auditor/informe', 'ChartController@index')->name('chart.index');
});




Route::group(['middleware' => 'role:Administrador|Super'],function(){
   // Route::resource('admin/usuarios', 'UsuariosWebController');
    //Route::resource('admin/empresas', 'EmpresasWebController');
    //Route::resource('admin/campos', 'CamposController');
    //Route::get('admin/create-table', 'TableController@operate');
    Route::get('admin/exportar_usuarios', 'UsuariosWebController@exportar')->name('usuarios.exportar');
    Route::get('admin/exportar_roles', 'RolesController@exportar')->name('roles.exportar');
    Route::get('admin/exportar_empresas', 'EmpresasWebController@exportar')->name('empresas.exportar');
    Route::get('admin/exportar_campos', 'CamposController@exportar')->name('campos.exportar');
    Route::get('dinamico_usuarios/traer', 'UsuariosWebController@postSearch')->name('usuarios.fetch');
    Route::get('admin/usuarios/clave/{id}', 'UsuariosWebController@clave')->name('usuarios.clave');
    Route::post('/actualizaclave/{id}','UsuariosWebController@actualizaclave')->name('actualizaclave');

    Route::resource('admin/roles', 'RolesController', [
        'names' => [
            'index'     => 'roles.listar',
            'create'    => 'roles.crear',
            'edit'      => 'roles.editar',
            'store'      => 'roles.guardar',
            'update'      => 'roles.actualizar',
            'destroy'      => 'roles.eliminar',
        ]
    ]);

    Route::resource('admin/usuarios', 'UsuariosWebController', [
        'names' => [
            'index'     => 'usuarios.listar',
            'create'    => 'usuarios.crear',
            'edit'      => 'usuarios.editar',
            'store'      => 'usuarios.guardar',
            'update'      => 'usuarios.actualizar',
            'destroy'      => 'usuarios.eliminar',
        ]
    ]);

    Route::resource('admin/campos', 'CamposController', [
        'names' => [
            'index'     => 'campos.listar',
            'create'    => 'campos.crear',
            'edit'      => 'campos.editar',
            'store'      => 'campos.guardar',
            'update'      => 'campos.actualizar',
            'destroy'      => 'campos.eliminar',
        ]
    ]); 

    Route::resource('admin/empresas', 'EmpresasWebController', [
        'names' => [
            'index'     => 'empresas.listar',
            'create'    => 'empresas.crear',
            'edit'      => 'empresas.editar',
            'store'      => 'empresas.guardar',
            'update'      => 'empresas.actualizar',
            'destroy'      => 'empresas.eliminar',
        ]
    ]); 
    
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);

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

/*

    testiar control de permisos
*/

    Route::group(['middleware' => ['permission:destroy_usuarios']], function () {
        Route::get('admin/usuarios/{id}/destroy', 'UsuariosWebController@destroy')->name('usuarios.destroy');
    });