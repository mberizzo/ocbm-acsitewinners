<?php namespace Mberizzo\Acsitewinners\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateMberizzoAcsitewinnersWinners extends Migration
{
    public function up()
    {
        Schema::table('mberizzo_acsitewinners_winners', function($table)
        {
            $table->string('monto_entregado', 191)->nullable();
            $table->string('proximo_sorteo')->nullable();
        });
    }

    public function down()
    {
        Schema::table('mberizzo_acsitewinners_winners', function($table)
        {
            $table->dropColumn('monto_entregado');
            $table->dropColumn('proximo_sorteo');
        });
    }
}
