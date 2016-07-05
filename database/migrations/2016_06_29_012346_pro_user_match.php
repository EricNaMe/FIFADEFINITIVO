<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProUserMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_user_match',function(Blueprint $table){
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pro_match_id');
            $table->primary(['user_id','pro_match_id']);
            $table->boolean('local');
            $table->unsignedInteger('position_id');
            $table->unique(['local','pro_match_id','position_id']);

            $table->unsignedInteger('goals');
            $table->unsignedInteger('yellow_cards');
            $table->unsignedInteger('red_cards');
            $table->boolean('defence_unbeaten');
            $table->unsignedInteger('assists');
            $table->boolean('goalkeeper_unbeaten');
            $table->boolean('best_player');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pro_match_id')->references('id')->on('pro_match_league');
            $table->foreign('position_id')->references('id')->on('match_positions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
