<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Empresa;
use App\Forms\AltaFrm;
use DB; 
use Hash;
use Auth;
use Session;
use Carbon\Carbon;

class AltaController extends Controller
{
	private $formBuilder;

    public function __construct(FormBuilder $formBuilder){
        $this->middleware('auth');
        $this->formBuilder = $formBuilder;
    }

    private function getForm(?Empresa $post = null){
        $post = $post ?: new Empresa();
        return $this->formBuilder->create(\App\Formularios\AltaFrm::class, [
            'model' => $post,
            'data' => [
                'admin' => false
            ]
        ]);

    }

    public function create()
    {
    	abort(403, 'No esta permitida esta acción.');    
    }

    public function store()
    {
    	abort(403, 'No esta permitida esta acción.');    
    }

    public function index(FormBuilder $formBuilder)
    {
    	$idempresa = Auth::user()->getEmpresa();
        $model = Empresa::find($idempresa);
        $form = $this->getForm($model);
        return view('registros.formulario_alta.nuevo_alta', compact('form','id'));
    }

    public function update($id)
    {   
    	$exists = Empresa::where('idemp', '=', $id)->exists();
        if(!$exists){
            Session::flash('error', 'Empresa no existe');
            return redirect()->back()->withInput();
        }

        $model = Empresa::find($id);
        $form = $this->getForm($model);
        $form->redirectIfNotValid();

        $campos = $form->getFieldValues();

       // $campos['activado'] = 0;

       $campos['empresa_validada'] = Carbon::now();

       // dd($campos);


        $model->fill($campos);
     

        $model->save();
        return redirect()->route('empresa');
    }
}
