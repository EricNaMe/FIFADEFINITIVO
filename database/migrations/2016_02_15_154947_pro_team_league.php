<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProTeamLeague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('pro_team_pro_league',function(Blueprint $table){
            $table->unsignedInteger('pro_team_id');
            $table->unsignedInteger('pro_league_id');
            $table->enum('status', [
                'acepted',
                'rejected',
                'pending',
    
            ]);


            $table->unique(['pro_team_id']);

          $table->foreign('pro_team_id')->references('id')->on('pro_teams');
          $table->foreign('pro_league_id')->references('id')->on('pro_leagues');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('pro_team_pro_league');  //
    }
}
