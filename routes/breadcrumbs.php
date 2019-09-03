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


// Admin > Usuarios
Breadcrumbs::for('usuariosweb.index', function ($trail) {
    $trail->parent('inicio');
    $trail->push('Listar Usuarios', route('usuariosweb.index'));
});


Breadcrumbs::for('usuariosweb.create', function ($trail) {
    $trail->parent('usuariosweb.index');
    $trail->push('Nuevo Usuario', route('usuariosweb.create'));
});

Breadcrumbs::for('usuariosweb.edit', function ($trail) {
    $trail->parent('usuariosweb.index');
    $trail->push('Editar Usuario', route('usuariosweb.create'));
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