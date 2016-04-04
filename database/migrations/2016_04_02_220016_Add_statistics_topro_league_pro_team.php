<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatisticsToproLeagueProTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('pro_league_pro_team',function(Blueprint $table){

            $table->unsignedInteger('JJ');
            $table->unsignedInteger('JG');
            $table->unsignedInteger('JE');
            $table->unsignedInteger('JP');
            $table->unsignedInteger('GF');
            $table->unsignedInteger('GC');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pro_league_pro_team',function(Blueprint $table){

            $table->dropColumn('JJ');
            $table->dropColumn('JG');
            $table->dropColumn('JE');
            $table->dropColumn('JP');
            $table->dropColumn('GF');
            $table->dropColumn('GC');
        });
    }
}
