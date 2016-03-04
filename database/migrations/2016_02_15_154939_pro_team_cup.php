<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProTeamCup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*     Schema::create('pro_team_cups',function(Blueprint $table){
            $table->unsignedInteger('pro_team_id');
            $table->unsignedInteger('pro_cup_id');
            $table->enum('status', [
                'acepted',
                'rejected',
                'pending',
    
            ]);


            $table->unique(['pro_team_id']);

        
        
        
        
          $table->foreign('pro_team_id')->references('id')->on('pro_teams');
          $table->foreign('pro_cup_id')->references('id')->on('pro_cups');
    });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //    Schema::drop('pro_team_cups');//
    }
}
