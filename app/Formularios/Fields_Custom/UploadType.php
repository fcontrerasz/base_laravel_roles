<?php 

namespace App\Formularios\Fields_Custom;

use Kris\LaravelFormBuilder\Fields\FormField;

class UploadType extends FormField {

    protected function getTemplate()
    {
        return 'campos.upload';
    }


    protected function getDefaults()
    {
        return [
            'extensions' => '',
            'view'       => '',
        ];
    }
}