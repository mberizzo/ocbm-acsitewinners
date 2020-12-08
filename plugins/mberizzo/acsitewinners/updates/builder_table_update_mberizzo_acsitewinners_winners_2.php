<?php namespace Mberizzo\Acsitewinners\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMberizzoAcsitewinnersWinners2 extends Migration
{
    public function up()
    {
        Schema::table('mberizzo_acsitewinners_winners', function($table)
        {
            $table->string('categoria')->nullable();
        });
    }

    public function down()
    {
        Schema::table('mberizzo_acsitewinners_winners', function($table)
        {
            $table->dropColumn('categoria');
        });
    }
}
