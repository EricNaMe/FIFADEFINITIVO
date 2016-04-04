<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPointsProLeagueProTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('pro_league_pro_team',function(Blueprint $table){

            $table->unsignedInteger('points');



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

            $table->dropColumn('points');
        });
    }
}
