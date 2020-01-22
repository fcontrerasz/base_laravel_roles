<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'usuarios';

    /**
     * Run the migrations.
     * @table usuarios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
//            $table->engine = 'MyISAM';
             $table->engine = 'InnoDB';
            $table->bigIncrements('idusr');
            $table->string('name', 191);
            $table->string('email', 191);
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password', 191);
            $table->rememberToken();
            $table->string('username')->nullable()->default(null);
            $table->integer('activado')->nullable()->default(null);
            $table->unique(["email"], 'users_email_unique');
            $table->nullableTimestamps();
        });

        $data = array(
            array('name' => 'Super Administrador', 'email' => 'super@reportes.cl', 'password' => '$2y$10$V9phlKyTk410BiO2r8B81.feTWVL2zC.Eqt14FpVUgsab8BB/LANm', 'username' => 'superadmin', 'activado' => 1),
            array('name' => 'Administrador', 'email' => 'admin@reportes.cl', 'password' => '$2y$10$V9phlKyTk410BiO2r8B81.feTWVL2zC.Eqt14FpVUgsab8BB/LANm', 'username' => 'admin', 'activado' => 1),
            array('name' => 'Auditor', 'email' => 'auditor@reportes.cl', 'password' => '$2y$10$V9phlKyTk410BiO2r8B81.feTWVL2zC.Eqt14FpVUgsab8BB/LANm', 'username' => 'auditor', 'activado' => 1),
            array('name' => 'Experto', 'email' => 'experto@reportes.cl', 'password' => '$2y$10$V9phlKyTk410BiO2r8B81.feTWVL2zC.Eqt14FpVUgsab8BB/LANm', 'username' => 'experto', 'activado' => 1),
            array('name' => 'Empresa', 'email' => 'empresa@reportes.cl', 'password' => '$2y$10$V9phlKyTk410BiO2r8B81.feTWVL2zC.Eqt14FpVUgsab8BB/LANm', 'username' => 'empresa', 'activado' => 1),
            array('name' => 'Generico', 'email' => 'generico@reportes.cl', 'password' => '$2y$10$V9phlKyTk410BiO2r8B81.feTWVL2zC.Eqt14FpVUgsab8BB/LANm', 'username' => 'generico', 'activado' => 1)
        );
       // Model::insert($data);
        DB::table('usuarios')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       //Schema::dropIfExists($this->tableName);
     }
}
