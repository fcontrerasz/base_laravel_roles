<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsigRolesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'asig_roles';

    /**
     * Run the migrations.
     * @table asig_roles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idasrol');
            $table->unsignedBigInteger('idrol');
            $table->unsignedBigInteger('idusr');
           // $table->foreign('idusr')->references('idusr')->on('usuarios');
            $table->nullableTimestamps();
            $table->index(["idusr"], 'fk_usuarios_has_perfil_usuario_idx');
            $table->index(["idrol"], 'fk_usuarios_has_perfil_perfil_idx');

            $table->foreign('idusr', 'fk_usuarios_has_perfil_usuario_idx')
                ->references('idusr')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');

          /*  $table->foreign('idrol', 'fk_usuarios_has_perfil_perfil_idx')
                ->references('idrol')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action'); */

        });


        DB::table('asig_roles')->insert(
        array(
            'idusr' => 1,
            'idrol' => 1
        )
        );
        
        DB::table('asig_roles')->insert(
        array(
            'idusr' => 2,
            'idrol' => 2
        )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
