<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('pro_match_league',function(Blueprint $table) {
            $table->foreign('DFC2_local_id')->references('id')->on('users');
            $table->foreign('DFC3_local_id')->references('id')->on('users');
            $table->foreign('MCD2_local_id')->references('id')->on('users');
            $table->foreign('MVI_local_id')->references('id')->on('users');
            $table->foreign('MVD_local_id')->references('id')->on('users');
            $table->foreign('MC2_local_id')->references('id')->on('users');
            $table->foreign('MCO2_local_id')->references('id')->on('users');


            $table->foreign('DFC2_visitor_id')->references('id')->on('users');
            $table->foreign('DFC3_visitor_id')->references('id')->on('users');
            $table->foreign('MCD2_visitor_id')->references('id')->on('users');
            $table->foreign('MVI_visitor_id')->references('id')->on('users');
            $table->foreign('MVD_visitor_id')->references('id')->on('users');
            $table->foreign('MC2_visitor_id')->references('id')->on('users');
            $table->foreign('MCO2_visitor_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pro_match_league',function(Blueprint $table) {

            $table->dropForeign('pro_match_league_DFC2_local_id_foreign');
            $table->dropForeign('pro_match_league_DFC3_local_id_foreign');
            $table->dropForeign('pro_match_league_MCD2_local_id_foreign');
            $table->dropForeign('pro_match_league_MVI_local_id_foreign');
            $table->dropForeign('pro_match_league_MVD_local_id_foreign');
            $table->dropForeign('pro_match_league_MC2_local_id_foreign');
            $table->dropForeign('pro_match_league_MCO2_local_id_foreign');

            $table->dropForeign('pro_match_league_DFC2_visitor_id_foreign');
            $table->dropForeign('pro_match_league_DFC3_visitor_id_foreign');
            $table->dropForeign('pro_match_league_MCD2_visitor_id_foreign');
            $table->dropForeign('pro_match_league_MVI_visitor_id_foreign');
            $table->dropForeign('pro_match_league_MVD_visitor_id_foreign');
            $table->dropForeign('pro_match_league_MC2_visitor_id_foreign');
            $table->dropForeign('pro_match_league_MCO2_visitor_id_foreign');
        });

    }
}
