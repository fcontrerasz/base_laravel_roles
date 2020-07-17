<?php

namespace App\Formularios;

use Kris\LaravelFormBuilder\Form;
use App\TipoCampos;


class CamposFrm extends Form
{
    public function buildForm()
    {
        
        if($this->getModel() && $this->getModel()->idcamp){
            $met = 'PUT';
            $url = route('campos.actualizar',$this->getModel()->idcamp);
        }else{
            $met = 'POST';
            $url = route('campos.guardar'); 
        }
        $this->formOptions = [
            'method' => $met,
            'url' => $url
        ];

        $this
            ->add('idtcamp', 'select2_entity', [
            'label' => 'Campo',
            'class' => 'App\TipoCampos',
            'property' => 'tipos_campos',
            'property_key' => 'idtcamp',
            'query_builder' => function (TipoCampos $ele) {
                return $ele;
            },
            'empty_value' => '=== Seleccione ===',
            'rules' => 'required'
            ])
            ->add('campo_descripcion', 'text', [
            'label' => 'Descripción',
            'rules' => 'required'
            ])
            ->add('campo_titulo', 'text', [
            'label' => 'Título',
            'rules' => 'required'
            ])
            ->add('campo_valores', 'text', [
            'label' => 'Valores',
            'rules' => 'required'
            ])

            ->add('Enviar', 'submit', ['label' => 'Guardar', 'attr' => ['class' => 'btn btn-primary'] ]);
    }
}
