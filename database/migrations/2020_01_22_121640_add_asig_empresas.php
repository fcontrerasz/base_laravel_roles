<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAsigEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asig_empresas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('idasemp');
            $table->unsignedBigInteger('idemp');

            $table->unsignedBigInteger('idusr');
            //$table->integer('idemp');
            //$table->integer('idusr');
            $table->index(["idusr"], 'fk_usuarios_has_empresa_idx');
            $table->index(["idemp"], 'fk_asig_emp_has_empresa_idx');

            $table->foreign('idusr', 'fk_usuarios_has_empresa_idx')
                ->references('id')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idemp')->references('idemp')->on('empresas');

            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
           // $table->nullableTimestamps();
        });

        $data = array(
            array('idemp' => 1, 'idusr' => 5),
            array('idemp' => 2, 'idusr' => 5),
        );
        DB::table('asig_empresas')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('asig_roles');
        Schema::dropIfExists('asig_empresas');
        Schema::dropIfExists('empresas');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('campos');
        Schema::dropIfExists('tipos_campos');
    }
}
