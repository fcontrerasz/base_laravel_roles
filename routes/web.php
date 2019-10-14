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

Auth::routes(['verify' => true]);

Route::group(['namespace' => 'Admin'],function(){
    Route::get('admin/home','HomeController@index')->name('admin.home');
    Route::resource('admin/user','UserController');
    Route::resource('admin/role','RoleController');
    Route::resource('admin/permission','PermissionController');
    Route::resource('admin/post','PostController');
    Route::resource('admin/tag','TagController');
    Route::resource('admin/category','CategoryController');
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});

Route::get('/formulariodealta', 'AltaController@alta')->name('frm_alta');

//formulario_alta

//Route::get('/admin', 'AdminController@index')->name('admin');

/*
Route::get('/vueadmin/{any?}', function (){
    return view('vue');
})->where('any', '^(?!api\/)[\/\w\.-]*')->name('vue');*/

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


Route::resource('formulariodealta', 'AltaController')->middleware('auth');


/*	Route::group(['prefix' => 'exports'], function() {
	    Route::get('contacts', 'ContactController@export');
	    Route::get('organizations', 'OrganizationController@export');
	    Route::get('items', 'ItemController@export');
	    Route::get('leads', 'LeadController@export');
	    Route::get('opportunities', 'OpportunityController@export');
	    Route::get('proposals', 'ProposalController@export');
	    Route::get('contracts', 'ContractController@export');
	    Route::get('projects', 'ProjectController@export');
	    Route::get('invoices', 'InvoiceController@export');
	    Route::get('payments', 'PaymentController@export');
	    Route::get('expenses', 'ExpenseController@export');
	    Route::get('vendors', 'VendorController@export');
	    Route::get('payment_requests', 'PaymentRequestCrudController@export');

	});*/

