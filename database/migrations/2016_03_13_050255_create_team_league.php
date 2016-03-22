<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamLeague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('team_leagues',function(Blueprint $table){
            $table->unsignedInteger('team_id');
            $table->unsignedInteger('league_id');
            $table->enum('status', [
                'acepted',
                'rejected',
                'pending',
    
            ]);


            $table->unique(['team_id']);

        
        
        
        
          $table->foreign('team_id')->references('id')->on('teams');
          $table->foreign('league_id')->references('id')->on('leagues');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
