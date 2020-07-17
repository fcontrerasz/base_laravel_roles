<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
      //  $this->call(UserTableSeeder::class);
       // $this->call(RolesTableSeeder::class);
        $this->call(usuariosSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        
    }
}
