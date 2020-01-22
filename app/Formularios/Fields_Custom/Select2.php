<?php 

namespace App\Formularios\Fields_Custom;

use Kris\LaravelFormBuilder\Fields\FormField;

class Select2 extends FormField
{

    protected function getTemplate()
    {
        return 'campos.select2';
    }

    public function getDefaults()
    {
        return [
            'choices' => [],
            'empty_value' => null,
            'selected' => null
        ];
    }
}