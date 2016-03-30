<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatchLeague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_league',function(Blueprint $table){
            $table->increments('id');

            $table->unsignedInteger('team_local_id');
            $table->unsignedInteger('team_visitor_id');
            $table->unsignedInteger('league_id');
            $table->unsignedInteger('local_score');
            $table->unsignedInteger('visitor_score');

            $table->foreign('team_visitor_id')->references('id')->on('teams');
            $table->foreign('team_local_id')->references('id')->on('teams');
            $table->foreign('league_id')->references('id')->on('teams');



    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('match_league');
    }
}
