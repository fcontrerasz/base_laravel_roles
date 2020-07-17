<?php

// Home
Breadcrumbs::for('inicio', function ($trail) {

        if(auth()->user()->hasRole('superadmin')){
            $trail->push('Inicio', route('superadmin'));
        }elseif(auth()->user()->hasRole('admin')){
            $trail->push('Inicio', route('admin'));
        }elseif(auth()->user()->hasRole('auditor')){
            $trail->push('Inicio', route('auditor'));
        }elseif(auth()->user()->hasRole('contratista')){
            $trail->push('Inicio', route('contratista'));
        }elseif(auth()->user()->hasRole('ito')){
            $trail->push('Inicio', route('ito'));
        }elseif(auth()->user()->hasRole('comite')){
            $trail->push('Inicio', route('comites'));
        }elseif(auth()->user()->hasRole('generico')){
            $trail->push('Inicio', route('generico'));
        } 
    
});


Breadcrumbs::for('usuarios', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Usuarios', route('usuarios'));
});

Breadcrumbs::for('superadmin', function ($trail) {
    $trail->parent('inicio');
});

Breadcrumbs::for('admin', function ($trail) {
    $trail->parent('inicio');
});

Breadcrumbs::for('comites', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Comites', route('comites'));
});

Breadcrumbs::for('reunion', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Reunion', route('reunion.index'));
});


// Admin > Usuarios
Breadcrumbs::for('configuracion.listar', function ($trail) {
    $trail->push('Inicio', URL::to('/'));
    $trail->push('Editar Configuración', route('usuarios.listar'));
});


// Admin > Usuarios
Breadcrumbs::for('usuarios.listar', function ($trail) {
    $trail->push('Inicio', URL::to('/'));
    $trail->push('Listar Usuarios', route('usuarios.listar'));
});

Breadcrumbs::for('usuarios.crear', function ($trail) {
    $trail->parent('usuarios.listar');
    $trail->push('Nuevo Usuario', route('usuarios.crear'));
});

Breadcrumbs::for('usuarios.editar', function ($trail) {
    $trail->parent('usuarios.listar');
    $trail->push('Editar Usuario', route('usuarios.crear'));
});

Breadcrumbs::for('usuarios.clave', function ($trail) {
    $trail->parent('usuarios.listar');
    $trail->push('Cambio de Clave', route('usuarios.listar'));
});

// Admin > Empresas
Breadcrumbs::for('empresas.listar', function ($trail) {
    $trail->push('Inicio', URL::to('/'));
    $trail->push('Listar Empresas', route('empresas.listar'));
});

Breadcrumbs::for('empresas.crear', function ($trail) {
    $trail->parent('empresas.listar');
    $trail->push('Nueva Empresa', route('empresas.crear'));
});

Breadcrumbs::for('empresas.editar', function ($trail) {
    $trail->parent('empresas.listar');
    $trail->push('Editar Empresa', route('empresas.crear'));
});


// Admin > Campos
Breadcrumbs::for('campos.listar', function ($trail) {
    $trail->push('Inicio', URL::to('/'));
    $trail->push('Listar Campos', route('campos.listar'));
});

Breadcrumbs::for('campos.crear', function ($trail) {
    $trail->parent('campos.listar');
    $trail->push('Nuevo Campo', route('campos.crear'));
});

Breadcrumbs::for('campos.editar', function ($trail) {
    $trail->parent('campos.listar');
    $trail->push('Editar Campo', route('campos.editar'));
});


// Roles > Listar
Breadcrumbs::for('roles.listar', function ($trail) {
    $trail->push('Inicio', URL::to('/'));
    $trail->push('Listar Roles', route('roles.listar'));
});

Breadcrumbs::for('roles.crear', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Listar Roles', route('roles.listar'));
    $trail->push('Crear Nuevo Rol');
});

Breadcrumbs::for('roles.editar', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Listar Roles', route('roles.listar'));
    $trail->push('Editar Rol');
});