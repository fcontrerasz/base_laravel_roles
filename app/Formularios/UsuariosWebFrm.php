<?php

namespace App\Formularios;

use Kris\LaravelFormBuilder\Form;


class UsuariosWebFrm extends Form
{
    public function buildForm()
    {

        if($this->getModel() && $this->getModel()->idusr){
            $met = 'PUT';
            $url = route('usuariosweb.update',$this->getModel()->idusr);
        }else{
            $met = 'POST';
            $url = route('usuariosweb.store');            
        }

        $this->formOptions = [
            'method' => $met,
            'url' => $url
        ];

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
            ->add('password', 'text', [
            'label' => 'Clave',
            'rules' => 'required'
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
            ->add('rol', 'select', [
            'choices' => [
                    3 => "USUARIO AUDITOR",
                    4 => "USUARIO ITO",
                    2 => "ADMINISTRADOR"
            ],
            'empty_value' => '=== Seleccione ===',
            'label' => 'Rol',
            'rules' => 'required'
            ])
            ->add('Enviar', 'submit', ['label' => 'Guardar', 'attr' => ['class' => 'btn-secondary btn'] ]);
    }
}
