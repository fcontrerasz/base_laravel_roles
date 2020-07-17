<?php

namespace App\Formularios;

use Kris\LaravelFormBuilder\Form;
use App\MenuRole;
use App\UsuariosWeb;
use Spatie\Permission\Models\Role;


class UsuariosWebFrm extends Form
{
    public function buildForm()
    {
        
        if($this->getModel() && $this->getModel()->id){
            $mostrar = false;
            $met = 'PUT';
            $url = route('usuarios.actualizar',$this->getModel()->id);
            $aux_user = UsuariosWeb::find($this->getModel()->id);
            $selected_roles = $aux_user->roles()->pluck('name', 'name')->toArray();
            //$selected_roles = $aux_user->roles_menu()->get()->pluck('idrol')->toArray();
        }else{
            $mostrar = true;
            $met = 'POST';
            $url = route('usuarios.guardar'); 
            $selected_roles = [];           
        }

        $this->formOptions = [
            'method' => $met,
            'url' => $url
        ];

        $roles = MenuRole::all()->pluck('rol_glosa', 'idrol')->toArray();
        $roles = Role::all()->pluck('name', 'name')->toArray();


        $this
            ->add('name', 'text', [
            'label' => 'Nombre del Usuario',
            'rules' => 'required'
            ])
            ->add('email', 'text', [
            'label' => 'Correo',
            'rules' => 'required|email|unique:usuarios,email'
            ])
            ->add('username', 'text', [
            'label' => 'Usuario',
            'rules' => 'required'
            ])
            ->add('role', 'choice', [
                'label' => 'Asignar Rol',
                'choices' => $roles,
                'selected' => $selected_roles,
                'choice_options' => [
                    'wrapper' => ['class' => 'choice-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'expanded' => true,
                'multiple' => true
            ]);

           // dd($mostrar);

            if($mostrar){
                $this->add('password', 'text', [
                'label' => 'Clave',
                'rules' => 'required'
                ]);
            }
            
            $this->add('activado', 'select', [
            'choices' => [
                    1 => "ACTIVADO",
                    0 => "OCULTO"
            ],
            'empty_value' => '=== Seleccione ===',
            'label' => 'Estado',
            'rules' => 'required'
            ])
           /* ->add('rol', 'entity', [
            'label' => 'Perfil',
            'class' => 'App\Role',
            'property' => 'rol_glosa',
            'property_key' => 'idrol',
            'query_builder' => function (Role $rol) {
                return $rol;
            },
            'empty_value' => '=== Seleccione ===',
            'rules' => 'required'
            ])*/
            ->add('Enviar', 'submit', ['label' => 'Guardar', 'attr' => ['class' => 'btn-secondary btn'] ]);
    }
}
