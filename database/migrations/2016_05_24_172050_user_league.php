<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLeague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('user_league', function(Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('league_id');
            $table->enum('status', [
                'active',
                'inactive',
            ]);

            $table->unsignedInteger('JJ');
            $table->unsignedInteger('JG');
            $table->unsignedInteger('JE');
            $table->unsignedInteger('JP');
            $table->unsignedInteger('GF');
            $table->unsignedInteger('GC');
    
            $table->unsignedInteger('points');    
            
            $table->foreign('user_id')->references('id')->on('users');
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
     Schema::drop('user_league');
    }
}
