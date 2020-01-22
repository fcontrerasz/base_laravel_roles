<?php

namespace App\Formularios;

use Kris\LaravelFormBuilder\Form;
use App\Empresa;
use App\UsuariosWeb;

class EmpresaFrm extends Form
{
    public function buildForm()
    {
        
        if($this->getModel() && $this->getModel()->idemp){
            $met = 'PUT';
            $url = route('empresas.update',$this->getModel()->idemp);
            $aux_emp = Empresa::find($this->getModel()->idemp);
            $asiguser = $aux_emp->users()->get()->first();
            $selected_asiguser = $asiguser->idusr;
           // $selected_roles = [];  
        }else{
            $met = 'POST';
            $url = route('empresas.store'); 
            $selected_asiguser = "";           
        }

        //dd($selected_asiguser);

        $this->formOptions = [
            'method' => $met,
            'url' => $url
        ];

        $rol = $this->getData('rol');
        
      //  if($rol == "admin") $roles = Role::whereIn('idrol', [2,4,8])->pluck('rol_glosa', 'idrol')->toArray();
     //   if($rol == "superadmin") $roles = Role::pluck('rol_glosa', 'idrol')->toArray();

        $usuarios = UsuariosWeb::pluck('name', 'idusr')->toArray();

        $this
            ->add('rut', 'text', [
            'label' => 'Rut',
            'rules' => 'required'
            ])
            ->add('nombre', 'text', [
            'label' => 'Empresa',
            'rules' => 'required'
            ])
            ->add('razon_social', 'text', [
            'label' => 'Razón Social',
            'rules' => 'required'
            ])

            ->add('email', 'text', [
            'label' => 'Correo',
            'rules' => 'required|email|unique:usuarios,email'
            ])

         
            ->add('activado', 'select', [
            'choices' => [
                    1 => "ACTIVADO",
                    0 => "OCULTO"
            ],
            'empty_value' => '=== Seleccione ===',
            'label' => 'Estado',
            'rules' => 'required'
            ])

            ->add('idusr', 'select2_entity', [
            'label' => 'Cuenta Asociada',
            'selected' => $selected_asiguser,
            'class' => 'App\UsuariosWeb',
            'property' => 'name',
            'property_key' => 'idusr',
            'query_builder' => function (UsuariosWeb $ele) {
                $qite = $ele::whereHas(
                    'roles', function($q){
                        $q->where('rol_nombre', 'empresa');
                    }
                )->get();
                return $qite;
            },
            'empty_value' => '=== Seleccione ===',
            'rules' => 'required|unique:asig_empresas'
            ])

            ->add('Enviar', 'submit', ['label' => 'Guardar', 'attr' => ['class' => 'btn btn-primary'] ]);
    }
}
