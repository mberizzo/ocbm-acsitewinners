<?php namespace Mberizzo\Acsitewinners\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMberizzoAcsitewinnersWinners extends Migration
{
    public function up()
    {
        Schema::create('mberizzo_acsitewinners_winners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('fecha');
            $table->integer('cuota');
            $table->string('producto');
            $table->string('nombre');
            $table->string('provincia');
            $table->string('valor');
            $table->string('nrosorteo');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mberizzo_acsitewinners_winners');
    }
}
