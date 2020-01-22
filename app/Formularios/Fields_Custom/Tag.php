<?php

namespace App\Formularios\Fields_Custom;

use Kris\LaravelFormBuilder\Fields\FormField;

class Tag extends FormField 
{
    protected function getTemplate()
    {
        return 'campos.tag';
    }

    protected function getDefaults()
    {
        return [
            'default_value' => '',
        ];
    }
}
