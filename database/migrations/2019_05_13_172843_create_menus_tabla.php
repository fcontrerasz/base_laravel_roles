<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->increments('idmn');
            $table->string('nombre', 150);
            $table->string('slug', 150)->unique();
            $table->unsignedInteger('padre')->default(0);
            $table->smallInteger('orden')->default(0);
            $table->boolean('activo')->default(1);
            $table->text('permisos')->default("");
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
