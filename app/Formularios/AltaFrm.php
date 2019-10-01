<?php

namespace App\Formularios;

use Kris\LaravelFormBuilder\Form;


class AltaFrm extends Form
{
    public function buildForm()
    {

        if($this->getModel() && $this->getModel()->idemp){
            $met = 'PUT';
            $url = route('formulariodealta.update',$this->getModel()->idemp);
        }else{
            abort(403, 'No esta permitida esta acción.');            
        }

        $this->formOptions = [
            'method' => $met,
            'url' => $url
        ];

        $this
            ->add('nombre', 'text', [
            'label' => 'Nombre de la Empresa',
            'rules' => 'required'
            ])
            ->add('razon_social', 'text', [
            'label' => 'Razón Social',
            'rules' => 'required'
            ])
            ->add('Enviar', 'submit', ['label' => 'Guardar', 'attr' => ['class' => 'btn-secondary btn'] ]);
    }
}
