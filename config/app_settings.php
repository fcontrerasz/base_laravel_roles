<?php

return [

    // All the sections for the settings page
    'sections' => [
        'app' => [
            'title' => 'Configuración General',
           // 'descriptions' => 'Datos de la Aplicación.', // (optional)
           'icon' => 'fa fa-cog', // (optional)

            'inputs' => [
                [
                    'name' => 'app_name', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Nombre Aplicación', // label for input
                    // optional properties
                    'placeholder' => 'Ingresa Nombre', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'style' => '', // any inline styles
                    'rules' => 'required|min:2|max:20', // validation rules for this input
                    'value' => 'Patache', // any default value
                   // 'hint' => 'You can set the app name here' // help block text for input
                ],
                [
                    'name' => 'logo',
                    'type' => 'image',
                    'label' => 'Logo',
                   // 'hint' => 'Must be an image and cropped in desired size',
                    'rules' => 'image|max:500',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ]
            ]
        ],
        'email' => [
            'title' => 'Email Settings',
         //   'descriptions' => 'How app email will be sent.',
           'icon' => 'fa fa-envelope',

            'inputs' => [
                [
                    'name' => 'from_email',
                    'type' => 'email',
                    'label' => 'Correo Salida',
                    'placeholder' => 'Correo de la aplicación',
                    'rules' => 'required|email',
                ],
                [
                    'name' => 'from_name',
                    'type' => 'text',
                    'label' => 'Nombre Salida',
                    'placeholder' => 'Nombre del Mail',
                ]
            ]
        ]
    ],

    // Setting page url, will be used for get and post request
    'url' => 'admin/configuracion',

    // Any middleware you want to run on above route
    'middleware' => ['auth','role:admin|superadmin'],

    // View settings
    'setting_page_view' => 'registros.configuracion',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'card mb-3',
    'section_heading_class' => 'p-xs h4',
    'section_body_class' => 'row',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group col-md-4 p-md',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Guardar',
    'submit_success_message' => 'Cambios aplicados.',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => false,
    'remove_label' => 'Quitar Imagen',

    // Controller to show and handle save setting
    'controller' => '\QCod\AppSettings\Controllers\AppSettingController',

    // settings group
    'setting_group' => function() {
        // return 'user_'.auth()->id();
        return 'default';
    }
];
