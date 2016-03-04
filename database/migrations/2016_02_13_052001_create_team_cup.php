<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamCup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('team_cups',function(Blueprint $table){
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('cup_id');
            $table->enum('status', [
                'acepted',
                'rejected',
                'pending',
    
            ]);


            $table->unique(['team_id']);

        
        
        
        
          $table->foreign('team_id')->references('id')->on('teams');
          $table->foreign('cup_id')->references('id')->on('cups');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     //  Schema::drop('create_team_cup');  //
    }
}
