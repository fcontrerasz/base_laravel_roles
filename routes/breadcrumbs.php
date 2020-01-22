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

// Home > About
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
Breadcrumbs::for('usuarios.index', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Listar Usuarios', route('usuarios.index'));
});

Breadcrumbs::for('usuarios.create', function ($trail) {
    $trail->parent('usuarios.index');
    $trail->push('Nuevo Usuario', route('usuarios.create'));
});

Breadcrumbs::for('usuarios.edit', function ($trail) {
    $trail->parent('usuarios.index');
    $trail->push('Editar Usuario', route('usuarios.create'));
});

Breadcrumbs::for('usuarios.clave', function ($trail) {
    $trail->parent('usuarios.index');
    $trail->push('Cambio de Clave', route('usuarios.index'));
});

// Admin > Empresas
Breadcrumbs::for('empresas.index', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Listar Empresas', route('empresas.index'));
});

Breadcrumbs::for('empresas.create', function ($trail) {
    $trail->parent('empresas.index');
    $trail->push('Nueva Empresa', route('empresas.create'));
});

Breadcrumbs::for('empresas.edit', function ($trail) {
    $trail->parent('empresas.index');
    $trail->push('Editar Empresa', route('empresas.create'));
});


// Admin > Usuarios > Crear

/*
// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});*/