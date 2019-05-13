<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'roles';

    /**
     * Run the migrations.
     * @table roles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idrol');
            $table->string('rol_nombre');
            $table->string('rol_glosa');
            $table->nullableTimestamps();
        });

        $data = array(
            array('rol_glosa' => 'Super Administrador', 'rol_nombre' => 'superadmin'),
            array('rol_glosa' => 'Administrador', 'rol_nombre' => 'admin'),
            array('rol_glosa' => 'Generico', 'rol_nombre' => 'generico'),
            array('rol_glosa' => 'Auditor', 'rol_nombre' => 'auditor'),
            array('rol_glosa' => 'Experto', 'rol_nombre' => 'experto'),
            array('rol_glosa' => 'Empresa', 'rol_nombre' => 'empresa')
        );
       // Model::insert($data);
        DB::table('roles')->insert($data);
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
