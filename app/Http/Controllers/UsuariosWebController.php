<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlantillaExport;
use App\UsuariosWeb;
use App\Role;
use App\Forms\UsuariosWebFrm;
use DB; 
use Hash;
use Auth;
use Session;

class UsuariosWebController extends Controller
{
	private $formBuilder;

    public function __construct(FormBuilder $formBuilder){
        $this->middleware('auth');
        $this->formBuilder = $formBuilder;
    }

    private function getForm(?UsuariosWeb $post = null){
        $post = $post ?: new UsuariosWeb();
        return $this->formBuilder->create(\App\Formularios\UsuariosWebFrm::class, [
            'model' => $post,
            'data' => [
                'admin' => false,
                'rol' => Auth::user()->getRole()
            ]
        ]);

    }

    public function index()
    {

        $nerds = new \App\UsuariosWeb;
        $nerds = $nerds->whereNotIn('username', ['superadmin', 'experto', 'empresa', 'generico', 'admin']);
        $nerds = $nerds->sortable()->paginate(20);

        return view('registros.usuarios.listar_usuariosweb', compact('nerds','report'));

    }

    public function show(){
        die(33);
    }

    public function clave($id){

        return view('registros.usuarios.cambiaclave', compact('id'));
    }

    public function claveForm(){
        return view('auth.changepass');
    }

     public function actualizaclave($id, Request $request){

        $exists = UsuariosWeb::where('idusr', '=', $id)->exists();
        if(!$exists){
            return redirect()->back()->with("error","Error de usuario.");
        }

        $model = UsuariosWeb::find($id);

        $validatedData = $request->validate([
            'new-password' => 'required|string|min:6',
        ]);

        //Change Password
        //$user = Auth::user();
        $model->password = bcrypt($request->get('new-password'));
        $model->save();

        return redirect()->route('usuarios.index');

    }

    public function cambiarClave(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Clave actual no es correcta.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","Nueva clave no puede ser igual a la existente.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","¡Cambio exitoso!");

    }

    public function create(FormBuilder $formBuilder)
    {
    	//dd(Auth::user()->getRole());
        $roles = Role::all();
        $form = $this->getForm();
        return view('registros.usuarios.nuevo_usuarioweb', compact('form','roles'));
    }

    public function store(FormBuilder $formBuilder, Request $request)
    {
    	
        $form = $this->getForm();
        

        if (!$form->isValid()) {
            Session::flash('error', 'No se pudo guardar.');
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        //dd($form->getFieldValues());

        $clave = $form->getFieldValues()["password"];
        $campos = $form->getFieldValues();
        $campos["password"] = bcrypt($clave);

        $aux_roles = $campos["role"];
        unset($campos["role"]);

        

        try {
        
            $aa = UsuariosWeb::create($campos);
        
        } catch (\Illuminate\Database\QueryException $exception) {
            
            $errorInfo = $exception->errorInfo;

            dd($errorInfo);
        }

       // dd($campos);

        $aa->roles()->detach();

        foreach ($aux_roles as $key => $value) {
           $aa->roles()->attach(Role::where('idrol', $value)->first());
        }


        return redirect()->route('usuarios.index');
    }



    public function edit($id)
    {
       /* $model = DB::table('usuarios')
        ->join('asig_roles', 'usuarios.idusr', '=', 'asig_roles.idrol')
        ->get()
        ->where('idusr', '=', $id);*/
        $model = UsuariosWeb::find($id);
        $roles = $model->roles()->get();
        $t_roles = Role::all();

        //dd($t_roles);
     
        //dd($model);
        $form = $this->getForm($model);
        return view('registros.usuarios.edita_usuarioweb', compact('form','id','roles'));
    }

    public function update($id)
    {   
        

    	$exists = UsuariosWeb::where('idusr', '=', $id)->exists();
        if(!$exists){
            Session::flash('error', 'Usuario no existe');
            return redirect()->back()->withInput();
        }

        $model = UsuariosWeb::find($id);
        $form = $this->getForm($model);
       
       // $form->redirectIfNotValid();

        $campos = $form->getFieldValues();

        $aux_roles = $campos["role"];
        unset($campos["role"]);

       // dd($campos);

       /* DB::table('ASIG_ROLES')->where('idusr', $id)->update(
            ['idrol' => $idrol,
             "updated_at" => \Carbon\Carbon::now()]
        );*/

        //$aa = UsuariosWeb::create($campos);

        $model->fill($campos);
        $model->save();


        $model->roles()->detach();

        foreach ($aux_roles as $key => $value) {
           $model->roles()->attach(Role::where('idrol', $value)->first());
        }

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
     //  dd($id);
        $model = UsuariosWeb::find($id);
        $model->roles()->detach();
        $model->delete();
        Session::put('message', 'Eliminado!');
        return redirect()->route('usuarios.index');
    }

    public function exportar()
    {
       // dd("HOla");
        return Excel::download(new PlantillaExport(), 'plantilla_123123_.xlsx');
    }

    public function postSearch(Request $request)
   {

        $term = $request->term ?: '';
        $tags = UsuariosWeb::where('name', 'like', $term.'%')->pluck('name', 'idusr');
        $valid_tags = [];
        foreach ($tags as $id => $tag) {
            $valid_tags[] = ['id' => $id, 'text' => $tag];
        }
        return \Response::json($valid_tags);

   }


  
}
