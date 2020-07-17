<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\UsuariosWeb as Usuarios;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
    {

        Permission::create(['name' => 'configuracion.listar']);

        //dd("llegue");
        //Permission list
        Permission::create(['name' => 'usuarios.listar']);
        Permission::create(['name' => 'usuarios.editar']);
        Permission::create(['name' => 'usuarios.mostrar']);
        Permission::create(['name' => 'usuarios.crear']);
        Permission::create(['name' => 'usuarios.eliminar']);
        Permission::create(['name' => 'usuarios.actualizar']);
        Permission::create(['name' => 'usuarios.clave']);
        Permission::create(['name' => 'usuarios.exportar']);

        Permission::create(['name' => 'campos.listar']);
        Permission::create(['name' => 'campos.editar']);
        Permission::create(['name' => 'campos.mostrar']);
        Permission::create(['name' => 'campos.crear']);
        Permission::create(['name' => 'campos.eliminar']);
        Permission::create(['name' => 'campos.actualizar']);
        Permission::create(['name' => 'campos.clave']);
        Permission::create(['name' => 'campos.exportar']);

        Permission::create(['name' => 'roles.listar']);
        Permission::create(['name' => 'roles.editar']);
        Permission::create(['name' => 'roles.actualizar']);
        Permission::create(['name' => 'roles.mostrar']);
        Permission::create(['name' => 'roles.crear']);
        Permission::create(['name' => 'roles.eliminar']);
        Permission::create(['name' => 'roles.exportar']);
        
        Permission::create(['name' => 'empresas.listar']);
        Permission::create(['name' => 'empresas.editar']);
        Permission::create(['name' => 'empresas.mostrar']);
        Permission::create(['name' => 'empresas.crear']);
        Permission::create(['name' => 'empresas.eliminar']);
        Permission::create(['name' => 'empresas.exportar']);
        Permission::create(['name' => 'empresas.actualizar']);

        Permission::create(['name' => 'menus.listar']);
        Permission::create(['name' => 'menus.editar']);
        Permission::create(['name' => 'menus.mostrar']);
        Permission::create(['name' => 'menus.crear']);
        Permission::create(['name' => 'menus.eliminar']);

        $rolsuper = Role::create(['name' => 'Super']);
        $roladmin = Role::create(['name' => 'Administrador']);
        $rolauditor = Role::create(['name' => 'Auditor']);
        $rolexperto = Role::create(['name' => 'Experto']);
        $rolempresa = Role::create(['name' => 'Empresa']);
        $rolgenerico = Role::create(['name' => 'Generico']);

        $rolauditor->givePermissionTo([
            'usuarios.listar',
            'usuarios.editar',
            'usuarios.mostrar',
            'usuarios.crear',
            'usuarios.eliminar'
        ]);

        $rolsuper->givePermissionTo([
            'configuracion.listar',
            'usuarios.listar',
            'usuarios.editar',
            'usuarios.mostrar',
            'usuarios.crear',
            'usuarios.eliminar',
            'usuarios.actualizar',
            'usuarios.clave',
            'usuarios.exportar',
            'campos.listar',
            'campos.editar',
            'campos.mostrar',
            'campos.crear',
            'campos.eliminar',
            'campos.actualizar',
            'campos.clave',
            'campos.exportar',
            'roles.listar',
            'roles.editar',
            'roles.actualizar',
            'roles.mostrar',
            'roles.crear',
            'roles.eliminar',
            'roles.exportar',
            'empresas.listar',
            'empresas.editar',
            'empresas.mostrar',
            'empresas.crear',
            'empresas.eliminar',
            'empresas.exportar',
            'empresas.actualizar',
            'menus.listar',
            'menus.editar',
            'menus.mostrar',
            'menus.crear',
            'menus.eliminar',
        ]);

        $roladmin->givePermissionTo([
            'configuracion.listar',
            'usuarios.listar',
            'usuarios.editar',
            'usuarios.mostrar',
            'usuarios.crear',
            'usuarios.eliminar',
            'usuarios.actualizar',
            'usuarios.clave',
            'usuarios.exportar',
        ]);


        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());
       
        //SuperAdmin
        $user = Usuarios::find(1);
        $user->assignRole(['Super']);
        //Admin
        $user = Usuarios::find(2);
        $user->assignRole(['Administrador']);
        //Auditor
        $user = Usuarios::find(3);
        $user->assignRole(['Auditor']);
        //Experto
        $user = Usuarios::find(4);
        $user->assignRole(['Experto']);
        //Empresa
        $user = Usuarios::find(5);
        $user->assignRole(['Empresa']);
        //Generico
        $user = Usuarios::find(6);
        $user->assignRole(['Generico']);

    }
}
