<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PlantillaExport;
use App\Campos;
use App\TipoCampos;
use App\Formularios\CamposFrm;
use DB; 
use Hash;
use Auth;
use Session;

class CamposController extends Controller
{
	private $formBuilder;

    public function __construct(FormBuilder $formBuilder){
        $this->middleware('auth');
        $this->formBuilder = $formBuilder;
    }

    private function getForm(?Campos $post = null){
        $post = $post ?: new Campos();
        return $this->formBuilder->create(\App\Formularios\CamposFrm::class, [
            'model' => $post,
            'data' => [
                'admin' => false
            ]
        ]);

    }

    public function index()
    {

        $nerds = new \App\Campos;
        $nerds = $nerds->sortable()->paginate(20);
        return view('registros.campos.listar_campo', compact('nerds'));

    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $this->getForm();
        return view('registros.campos.nuevo_campo', compact('form'));
    }

    public function store(FormBuilder $formBuilder, Request $request)
    {
    	
        $form = $this->getForm();
        

        if (!$form->isValid()) {
            Session::flash('error', 'No se pudo guardar.');
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $campos = $form->getFieldValues();

        try {
        
            $aa = Campos::create($campos);
        
        } catch (\Illuminate\Database\QueryException $exception) {
            
            $errorInfo = $exception->errorInfo;

            dd($errorInfo);

            return redirect()->back()->withErrors($errorInfo)->withInput();
        }

        return redirect()->route('campos.index');
    }



    public function edit($id)
    {

        $model = Campos::find($id);
        $form = $this->getForm($model);
        return view('registros.campos.edita_campo', compact('form'));
    }

    public function update($id)
    {   
        

    	$exists = Campos::where('idcamp', '=', $id)->exists();
        if(!$exists){
            Session::flash('error', 'Usuario no existe');
            return redirect()->back()->withInput();
        }

        $model = Campos::find($id);
        $form = $this->getForm($model);
       
        $campos = $form->getFieldValues();
        $model->fill($campos);
        $model->save();

        return redirect()->route('campos.index');
    }

    public function exportar()
    {
        return Excel::download(new PlantillaExport(), 'plantilla_123123_.xlsx');
    }

    public function destroy($id)
    {
        $model = Campos::find($id);
        $model->delete();
        Session::put('message', 'Eliminado!');
        return redirect()->route('campos.index');
    }

    


  
}
