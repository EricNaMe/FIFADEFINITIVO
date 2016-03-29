<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalendarForeignKeyMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('league_pro_calendars',function( $table){

            $table->unsignedInteger('match_id')->nullable(true);
            $table->foreign('match_id')->references('id')->on('pro_match_league');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('league_pro_calendars',function(Blueprint $table){
            $table->dropForeign('league_pro_calendars_match_id_foreign');
            $table->dropColumn('match_id');
        });
    }
}
