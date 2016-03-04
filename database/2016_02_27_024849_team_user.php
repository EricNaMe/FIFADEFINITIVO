<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeamUser extends Migration
{
    public function up()
    {
Schema::create('team_user',function(Blueprint $table){
    $table->unsignedInteger('user_id');
    $table->unsignedInteger('team_id');
    $table->enum('status',[
        'accepted',
        'rejected',
        'pending',
    ]);


    $table->unique(['team_id','user_id']);



    $table->foreign('user_id')->references('id')->on('users');
    $table->foreign('team_id')->references('id')->on('teams');

});
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::drop('team_user');
}















}