<?php

namespace App\Formularios\Fields_Custom;

use Kris\LaravelFormBuilder\Fields\FormField;

class Year extends FormField 
{
    protected function getTemplate()
    {
        return 'campos.year';
    }

    protected function getDefaults()
    {
        return [
            'default_value' => '',
        ];
    }
}
