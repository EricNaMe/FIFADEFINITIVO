<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullableVisitorIdInLeagueProCalendars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('league_pro_calendars',function( $table){
            $table->dropColumn('status');
        });


        Schema::table('league_pro_calendars',function( $table){
            $table->unsignedInteger('visitor_id')->nullable(true)->change();
        });

        Schema::table('league_pro_calendars',function( $table){
            $table->unsignedInteger('local_id')->nullable(true)->change();
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
