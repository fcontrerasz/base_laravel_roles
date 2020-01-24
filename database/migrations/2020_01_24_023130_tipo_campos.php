<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoCampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_campos', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->increments('idtcamp');
            $table->string('tipos_campos', 255);
            $table->string('tipo_campo', 255);
            $table->longText('ayuda_campo');
            $table->timestamps();
        });

         $data = array(
            array('tipos_campos' => 'Desplegable', 'tipo_campo' => 'select', 'ayuda_campo' => ''),
            array('tipos_campos' => 'Multiselección', 'tipo_campo' => 'select-multiple', 'ayuda_campo' => ''),
            array('tipos_campos' => 'Texto', 'tipo_campo' => 'text', 'ayuda_campo' => ''),
            array('tipos_campos' => 'Casilla de verificación', 'tipo_campo' => 'checkbox', 'ayuda_campo' => ''),
        );
        DB::table('tipos_campos')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_campos');
    }
}
