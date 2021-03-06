<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auditor = factory(Menu::class)->create([
            'nombre' => 'Panel',
            'slug' => 'auditor',
            'padre' => 0,
            'orden' => 0,
            'activo' => 1,
            'permisos' => '{ "roles": ["Auditor"] }'
        ]);

        $empresa = factory(Menu::class)->create([
            'nombre' => 'Inicio',
            'slug' => 'empresa',
            'padre' => 0,
            'orden' => 0,
            'activo' => 1,
            'permisos' => '{ "roles": ["Empresa"] }'
        ]);

        $super = factory(Menu::class)->create([
            'nombre' => 'Inicio',
            'slug' => 'superadmin',
            'padre' => 0,
            'orden' => 0,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super"] }'
        ]);

        $admin = factory(Menu::class)->create([
            'nombre' => 'Inicio',
            'slug' => 'admin',
            'padre' => 0,
            'orden' => 0,
            'activo' => 1,
            'permisos' => '{ "roles": ["Administrador"] }'
        ]);

        $experto = factory(Menu::class)->create([
            'nombre' => 'Inicio',
            'slug' => 'experto',
            'padre' => 0,
            'orden' => 0,
            'activo' => 1,
            'permisos' => '{ "roles": ["Experto"] }'
        ]);

        $config = factory(Menu::class)->create([
            'nombre' => 'Configuración',
            'slug' => 'dummy-configuracion',
            'padre' => 0,
            'orden' => 2,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super"] }'
        ]);

        $general = factory(Menu::class)->create([
            'nombre' => 'General',
            'slug' => 'admin/configuracion',
            'padre' => $config->id,
            'orden' => 0,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super"] }'
        ]);


        $usuarios =  factory(Menu::class)->create([
            'nombre' => 'Accesos',
            'slug' => 'dummy-accesos',
            'padre' => 0,
            'orden' => 1,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super","Administrador"] }'
        ]);

        factory(Menu::class)->create([
            'nombre' => 'Usuarios',
            'slug' => 'admin/usuarios',
            'padre' => $usuarios->id,
            'orden' => 1,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super","Administrador"] }'
        ]);

        factory(Menu::class)->create([
            'nombre' => 'Roles',
            'slug' => 'admin/roles',
            'padre' => $usuarios->id,
            'orden' => 2,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super"] }'
        ]);

        $menu = factory(Menu::class)->create([
            'nombre' => 'Menus',
            'slug' => 'admin/menues',
            'padre' => $config->id,
            'orden' => 1,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super"] }'
        ]);
        
     /*   factory(Menu::class)->create([
            'nombre' => 'Listar Menues',
            'slug' => 'listar.menues',
            'padre' => $menu->id,
            'orden' => 0,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super"] }'
        ]);*/

        factory(Menu::class)->create([
            'nombre' => 'Empresas',
            'slug' => 'admin/empresas',
            'padre' => 0,
            'orden' => 2,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super"] }'
        ]);

        factory(Menu::class)->create([
            'nombre' => 'Campos',
            'slug' => 'admin/campos',
            'padre' => 0,
            'orden' => 3,
            'activo' => 1,
            'permisos' => '{ "roles": ["Super"] }'
        ]);

      

      /*  factory(Menu::class)->create([
            'nombre' => 'Opción 2',
            'slug' => 'opcion2',
            'padre' => 0,
            'orden' => 1,
        ]);
        $m3 = factory(Menu::class)->create([
            'nombre' => 'Opción 3',
            'slug' => 'opcion3',
            'padre' => 0,
            'orden' => 2,
        ]);
        $m4 = factory(Menu::class)->create([
            'nombre' => 'Opción 4',
            'slug' => 'opcion4',
            'padre' => 0,
            'orden' => 3,
        ]);
        factory(Menu::class)->create([
            'nombre' => 'Opción 1.1',
            'slug' => 'opcion-1.1',
            'padre' => $m1->id,
            'orden' => 0,
        ]);
        factory(Menu::class)->create([
            'nombre' => 'Opción 1.2',
            'slug' => 'opcion-1.2',
            'padre' => $m1->id,
            'orden' => 1,
        ]);
        factory(Menu::class)->create([
            'nombre' => 'Opción 3.1',
            'slug' => 'opcion-3.1',
            'padre' => $m3->id,
            'orden' => 0,
        ]);
        $m32 = factory(Menu::class)->create([
            'nombre' => 'Opción 3.2',
            'slug' => 'opcion-3.2',
            'padre' => $m3->id,
            'orden' => 1,
        ]);
        factory(Menu::class)->create([
            'nombre' => 'Opción 4.1',
            'slug' => 'opcion-4.1',
            'padre' => $m4->id,
            'orden' => 0,
        ]);
        factory(Menu::class)->create([
            'nombre' => 'Opción 3.2.1',
            'slug' => 'opcion-3.2.1',
            'padre' => $m32->id,
            'orden' => 0,
        ]);
        factory(Menu::class)->create([
            'nombre' => 'Opción 3.2.2',
            'slug' => 'opcion-3.2.2',
            'padre' => $m32->id,
            'orden' => 1,
        ]);
        factory(Menu::class)->create([
            'nombre' => 'Opción 3.2.3',
            'slug' => 'opcion-3.2.3',
            'padre' => $m32->id,
            'orden' => 2,
        ]);*/
    }
}
