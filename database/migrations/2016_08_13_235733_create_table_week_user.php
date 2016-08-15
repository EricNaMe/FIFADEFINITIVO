<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWeekUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_user_week', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('week_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('league_id');
            $table->String('position');
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('defence_unbeaten');
            $table->unsignedInteger('gk_unbeaten');
            $table->unsignedInteger('goals');


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('position_id')->references('id')->on('match_positions');
            $table->foreign('league_id')->references('id')->on('pro_leagues');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pro_user_week');
    }
}
