<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameProLeagueId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('league_pro_calendars',function( $table){
            $table->renameColumn('league_id','pro_league_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('league_pro_calendars',function( $table){
            $table->renameColumn('pro_league_id','league_id');
        });
    }
}
