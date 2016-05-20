<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPointsUserProleague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_pro_league', function(Blueprint $table) {
      
            $table->unsignedInteger('points')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
           Schema::table('user_pro_league',function(Blueprint $table){

            $table->dropColumn('points');
            
        });
    }
}
