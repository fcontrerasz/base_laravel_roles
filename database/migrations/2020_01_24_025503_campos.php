<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Campos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idcamp');
            $table->unsignedInteger('idtcamp');
            $table->longText('campo_descripcion');
            $table->string('campo_titulo', 255);
            $table->longText('campo_valores');
            $table->timestamps();
            $table->index(["idtcamp"], 'fk_campos_has_tipocampos');
             $table->foreign('idtcamp', 'fk_campos_has_tipocampos')
                ->references('idtcamp')->on('tipos_campos')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campos');
    }
}
