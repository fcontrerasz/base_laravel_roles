<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{

    public $tableName = 'empresas';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->bigIncrements('idemp');
            $table->string('rut', 191);
            $table->string('nombre', 191);
            $table->string('email', 191);
             $table->timestamp('empresa_validada')->nullable()->default(null);
             $table->integer('activado')->nullable()->default(null);
            $table->nullableTimestamps();
        });

        $data = array(
            array('nombre' => 'Empresa 01', 'email' => 'empresa01@reportes.cl', 'rut' => '1-1', 'nombre' => 'Empresa 01', 'activado' => 1),
            array('nombre' => 'Empresa 02', 'email' => 'empresa02@reportes.cl', 'rut' => '2-2', 'nombre' => 'Empresa 02', 'activado' => 1)
        );
        DB::table('empresas')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //  Schema::dropIfExists('empresas');
    }
}
