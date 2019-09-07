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
            $table->date('date');
            $table->integer('num_installments');
            $table->string('product_name');
            $table->string('name', 150);
            $table->string('location', 150);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mberizzo_acsitewinners_winners');
    }
}
