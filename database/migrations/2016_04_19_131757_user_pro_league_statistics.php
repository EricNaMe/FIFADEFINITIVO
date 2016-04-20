<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserProLeagueStatistics extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_pro_league', function(Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pro_league_id');
            $table->enum('status', [
                'active',
                'inactive',
            ]);

            $table->unsignedInteger('JJ');
            $table->unsignedInteger('JG');
            $table->unsignedInteger('JE');
            $table->unsignedInteger('JP');
    
            $table->unsignedInteger('points');
            $table->unsignedInteger('assistance');
            $table->unsignedInteger('yellow_card');
            $table->unsignedInteger('red_card');
            $table->unsignedInteger('points');
            $table->unsignedInteger('goals');
            $table->unsignedInteger('best_player');
            $table->unsignedInteger('gk_unbeaten');
            $table->unsignedInteger('defence_unbeaten');


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pro_league_id')->references('id')->on('pro_leagues');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
          Schema::drop('user_pro_league');
    }

}
