<?php

return [
    'defaults'      => [
        'wrapper_class'       => 'form-group',
        'wrapper_error_class' => 'has-error',
        'label_class'         => 'control-label',
        'field_class'         => 'form-control',
        'help_block_class'    => 'help-block',
        'error_class'         => 'text-danger',
        'required_class'      => 'required'
    ],
    // Templates
    'form'          => 'laravel-form-builder::form',
    'text'          => 'laravel-form-builder::text',
    'textarea'      => 'laravel-form-builder::textarea',
    'button'        => 'laravel-form-builder::button',
    'radio'         => 'laravel-form-builder::radio',
    'checkbox'      => 'laravel-form-builder::checkbox',
    'select'        => 'laravel-form-builder::select',
    'choice'        => 'laravel-form-builder::choice',
    'repeated'      => 'laravel-form-builder::repeated',
    'child_form'    => 'laravel-form-builder::child_form',
    'collection'    => 'laravel-form-builder::collection',
    'static'        => 'laravel-form-builder::static',

    'default_namespace' => '',

    'custom_fields' => [
        'tag'   =>  'App\Formularios\Fields_Custom\Tag',
        'tag_entity'   =>  'App\Formularios\Fields_Custom\EntityTag',
        'select2_ajax'              => 'App\Formularios\Fields_Custom\Select2Ajax',
        'select2'              => 'App\Formularios\Fields_Custom\Select2',
        'select2_entity'              => 'App\Formularios\Fields_Custom\EntitySelect2Type',
        'upload'                   => 'App\Formularios\Fields_Custom\UploadType',
        'year'   =>  'App\Formularios\Fields_Custom\Year',
    ]
];
