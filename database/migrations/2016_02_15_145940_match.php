<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Match extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('matches',function(Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('user_id');
          
            $table->unsignedInteger('pro_cup_id');
            $table->unsignedInteger('pro_league_id');
            
            $table->unsignedInteger('cup_id');
            $table->unsignedInteger('league_id');
            
            $table->unsignedInteger('pro_team_id');
            $table->unsignedInteger('pro_team_local_id');
            $table->unsignedInteger('pro_team_visitor_id');
            
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('team_local_id');
            $table->unsignedInteger('team_visitor_id');
            
            $table->unsignedInteger('local_score');
            $table->unsignedInteger('visitor_score');
    
          


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cup_id')->references('id')->on('cups');
            $table->foreign('league_id')->references('id')->on('leagues');
            
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('team_local_id')->references('id')->on('teams');
            $table->foreign('team_visitor_id')->references('id')->on('teams');
            
            $table->foreign('pro_team_id')->references('id')->on('pro_teams');
            $table->foreign('pro_team_local_id')->references('id')->on('pro_teams');
            $table->foreign('pro_team_visitor_id')->references('id')->on('pro_teams');
            
           
            $table->foreign('pro_cup_id')->references('id')->on('pro_cups');
            $table->foreign('pro_league_id')->references('id')->on('pro_leagues');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('matches');//
    }
}
