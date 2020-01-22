<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlantillaExport;
use App\Empresa;
use App\UsuariosWeb;
use App\Forms\EmpresaFrm;
use DB; 
use Hash;
use Auth;
use Session;

class EmpresasWebController extends Controller
{
	private $formBuilder;

    public function __construct(FormBuilder $formBuilder){
        $this->middleware('auth');
        $this->formBuilder = $formBuilder;
    }

    private function getForm(?Empresa $post = null){
        $post = $post ?: new Empresa();
        return $this->formBuilder->create(\App\Formularios\EmpresaFrm::class, [
            'model' => $post,
            'data' => [
                'admin' => false,
                'rol' => Auth::user()->getRole()
            ]
        ]);

    }

    public function index()
    {

        $nerds = new \App\Empresa;
        $nerds = $nerds->sortable()->paginate(20);
        return view('registros.empresas.listar_empresa', compact('nerds'));

    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $this->getForm();
        return view('registros.empresas.nuevo_empresa', compact('form'));
    }

    public function store(FormBuilder $formBuilder, Request $request)
    {
    	
        $form = $this->getForm();
        

        if (!$form->isValid()) {
            Session::flash('error', 'No se pudo guardar.');
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        //dd($form->getFieldValues());


        $campos = $form->getFieldValues();

        $aux_usuario = $campos["idusr"];
        unset($campos["idusr"]);


        try {
        
            $aa = Empresa::create($campos);
        
        } catch (\Illuminate\Database\QueryException $exception) {
            
            $errorInfo = $exception->errorInfo;

            dd($errorInfo);
        }

      //  dd($aa);

        $aa->users()->detach();
        $aa->users()->attach(UsuariosWeb::where('idusr', $aux_usuario)->first());


        return redirect()->route('empresas.index');
    }



    public function edit($id)
    {

        $model = Empresa::find($id);
        $form = $this->getForm($model);
        return view('registros.empresas.edita_empresa', compact('form','id'));
    }

    public function update($id)
    {   
        

    	$exists = Empresa::where('idemp', '=', $id)->exists();
        if(!$exists){
            Session::flash('error', 'Usuario no existe');
            return redirect()->back()->withInput();
        }

        $model = Empresa::find($id);
        $form = $this->getForm($model);
       
        $campos = $form->getFieldValues();
        $aux_usuario = $campos["idusr"];
        unset($campos["idusr"]);

        $model->fill($campos);
        $model->save();

        //dd($model);

        $model->users()->detach();
        $model->users()->attach(UsuariosWeb::where('idusr', $aux_usuario)->first());

        return redirect()->route('empresas.index');
    }

    public function destroy($id)
    {
        $model = Empresa::find($id);
        $model->users()->detach();
        $model->delete();
        Session::put('message', 'Eliminado!');
        return redirect()->route('empresas.index');
    }

    public function exportar()
    {
        return Excel::download(new PlantillaExport(), 'plantilla_123123_.xlsx');
    }


  
}
