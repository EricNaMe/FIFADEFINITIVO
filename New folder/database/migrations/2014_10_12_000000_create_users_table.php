<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('user_name');
            $table->string('gamertag');
            $table->string('position');    
            $table->string('quote');
            $table->string('platform');
            $table->unsignedInteger('assistance');
            $table->unsignedInteger('yellow_card');
            $table->unsignedInteger('red_card');
            $table->unsignedInteger('goals');
            $table->unsignedInteger('best_player');
            $table->unsignedInteger('gk_unbeaten');
            $table->unsignedInteger('defence_unbeaten');
            $table->unsignedInteger('JJ');
            $table->unsignedInteger('JG');
            $table->unsignedInteger('JE');
            $table->unsignedInteger('JP');
            $table->unsignedInteger('pro_JJ');
            $table->unsignedInteger('pro_JG');
            $table->unsignedInteger('pro_JE');
            $table->unsignedInteger('pro_JP');
            $table->unsignedInteger('points');
            $table->unsignedInteger('pro_points');
        

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
