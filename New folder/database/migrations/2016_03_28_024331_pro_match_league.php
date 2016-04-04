<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProMatchLeague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_match_league',function(Blueprint $table){
            $table->increments('id');

            $table->unsignedInteger('team_local_id');
            $table->unsignedInteger('team_visitor_id');
            $table->unsignedInteger('league_id');
            $table->unsignedInteger('local_score');
            $table->unsignedInteger('visitor_score');

            $table->unsignedInteger('PO_local_id');
            $table->unsignedInteger('DFC_local_id');
            $table->unsignedInteger('LTI_local_id');
            $table->unsignedInteger('LTD_local_id');
            $table->unsignedInteger('MCD_local_id');
            $table->unsignedInteger('MC_local_id');
            $table->unsignedInteger('MI_local_id');
            $table->unsignedInteger('MD_local_id');
            $table->unsignedInteger('MCO_local_id');
            $table->unsignedInteger('EI_local_id');
            $table->unsignedInteger('ED_local_id');
            $table->unsignedInteger('DI_local_id');
            $table->unsignedInteger('DD_local_id');
            $table->unsignedInteger('DC_local_id');

            $table->unsignedInteger('PO_local_red');
            $table->unsignedInteger('DFC_local_red');
            $table->unsignedInteger('LTI_local_red');
            $table->unsignedInteger('LTD_local_red');
            $table->unsignedInteger('MCD_local_red');
            $table->unsignedInteger('MC_local_red');
            $table->unsignedInteger('MI_local_red');
            $table->unsignedInteger('MD_local_red');
            $table->unsignedInteger('MCO_local_red');
            $table->unsignedInteger('EI_local_red');
            $table->unsignedInteger('ED_local_red');
            $table->unsignedInteger('DI_local_red');
            $table->unsignedInteger('DD_local_red');
            $table->unsignedInteger('DC_local_red');

            $table->unsignedInteger('PO_local_yellow');
            $table->unsignedInteger('DFC_local_yellow');
            $table->unsignedInteger('LTI_local_yellow');
            $table->unsignedInteger('LTD_local_yellow');
            $table->unsignedInteger('MCD_local_yellow');
            $table->unsignedInteger('MC_local_yellow');
            $table->unsignedInteger('MI_local_yellow');
            $table->unsignedInteger('MD_local_yellow');
            $table->unsignedInteger('MCO_local_yellow');
            $table->unsignedInteger('EI_local_yellow');
            $table->unsignedInteger('ED_local_yellow');
            $table->unsignedInteger('DI_local_yellow');
            $table->unsignedInteger('DD_local_yellow');
            $table->unsignedInteger('DC_local_yellow');

            $table->unsignedInteger('PO_local_goal');
            $table->unsignedInteger('DFC_local_goal');
            $table->unsignedInteger('LTI_local_goal');
            $table->unsignedInteger('LTD_local_goal');
            $table->unsignedInteger('MCD_local_goal');
            $table->unsignedInteger('MC_local_goal');
            $table->unsignedInteger('MI_local_goal');
            $table->unsignedInteger('MD_local_goal');
            $table->unsignedInteger('MCO_local_goal');
            $table->unsignedInteger('EI_local_goal');
            $table->unsignedInteger('ED_local_goal');
            $table->unsignedInteger('DI_local_goal');
            $table->unsignedInteger('DD_local_goal');
            $table->unsignedInteger('DC_local_goal');

            $table->unsignedInteger('PO_local_assistance');
            $table->unsignedInteger('DFC_local_assistance');
            $table->unsignedInteger('LTI_local_assistance');
            $table->unsignedInteger('LTD_local_assistance');
            $table->unsignedInteger('MCD_local_assistance');
            $table->unsignedInteger('MC_local_assistance');
            $table->unsignedInteger('MI_local_assistance');
            $table->unsignedInteger('MD_local_assistance');
            $table->unsignedInteger('MCO_local_assistance');
            $table->unsignedInteger('EI_local_assistance');
            $table->unsignedInteger('ED_local_assistance');
            $table->unsignedInteger('DI_local_assistance');
            $table->unsignedInteger('DD_local_assistance');
            $table->unsignedInteger('DC_local_assistance');

            $table->unsignedInteger('PO_local_best_player');
            $table->unsignedInteger('DFC_local_best_player');
            $table->unsignedInteger('LTI_local_best_player');
            $table->unsignedInteger('LTD_local_best_player');
            $table->unsignedInteger('MCD_local_best_player');
            $table->unsignedInteger('MC_local_best_player');
            $table->unsignedInteger('MI_local_best_player');
            $table->unsignedInteger('MD_local_best_player');
            $table->unsignedInteger('MCO_local_best_player');
            $table->unsignedInteger('EI_local_best_player');
            $table->unsignedInteger('ED_local_best_player');
            $table->unsignedInteger('DI_local_best_player');
            $table->unsignedInteger('DD_local_best_player');
            $table->unsignedInteger('DC_local_best_player');

            $table->unsignedInteger('PO_local_unbeaten');


            $table->unsignedInteger('PO_visitor_id');
            $table->unsignedInteger('DFC_visitor_id');
            $table->unsignedInteger('LTI_visitor_id');
            $table->unsignedInteger('LTD_visitor_id');
            $table->unsignedInteger('MCD_visitor_id');
            $table->unsignedInteger('MC_visitor_id');
            $table->unsignedInteger('MI_visitor_id');
            $table->unsignedInteger('MD_visitor_id');
            $table->unsignedInteger('MCO_visitor_id');
            $table->unsignedInteger('EI_visitor_id');
            $table->unsignedInteger('ED_visitor_id');
            $table->unsignedInteger('DI_visitor_id');
            $table->unsignedInteger('DD_visitor_id');
            $table->unsignedInteger('DC_visitor_id');

            $table->unsignedInteger('PO_visitor_red');
            $table->unsignedInteger('DFC_visitor_red');
            $table->unsignedInteger('LTI_visitor_red');
            $table->unsignedInteger('LTD_visitor_red');
            $table->unsignedInteger('MCD_visitor_red');
            $table->unsignedInteger('MC_visitor_red');
            $table->unsignedInteger('MI_visitor_red');
            $table->unsignedInteger('MD_visitor_red');
            $table->unsignedInteger('MCO_visitor_red');
            $table->unsignedInteger('EI_visitor_red');
            $table->unsignedInteger('ED_visitor_red');
            $table->unsignedInteger('DI_visitor_red');
            $table->unsignedInteger('DD_visitor_red');
            $table->unsignedInteger('DC_visitor_red');

            $table->unsignedInteger('PO_visitor_yellow');
            $table->unsignedInteger('DFC_visitor_yellow');
            $table->unsignedInteger('LTI_visitor_yellow');
            $table->unsignedInteger('LTD_visitor_yellow');
            $table->unsignedInteger('MCD_visitor_yellow');
            $table->unsignedInteger('MC_visitor_yellow');
            $table->unsignedInteger('MI_visitor_yellow');
            $table->unsignedInteger('MD_visitor_yellow');
            $table->unsignedInteger('MCO_visitor_yellow');
            $table->unsignedInteger('EI_visitor_yellow');
            $table->unsignedInteger('ED_visitor_yellow');
            $table->unsignedInteger('DI_visitor_yellow');
            $table->unsignedInteger('DD_visitor_yellow');
            $table->unsignedInteger('DC_visitor_yellow');

            $table->unsignedInteger('PO_visitor_goal');
            $table->unsignedInteger('DFC_visitor_goal');
            $table->unsignedInteger('LTI_visitor_goal');
            $table->unsignedInteger('LTD_visitor_goal');
            $table->unsignedInteger('MCD_visitor_goal');
            $table->unsignedInteger('MC_visitor_goal');
            $table->unsignedInteger('MI_visitor_goal');
            $table->unsignedInteger('MD_visitor_goal');
            $table->unsignedInteger('MCO_visitor_goal');
            $table->unsignedInteger('EI_visitor_goal');
            $table->unsignedInteger('ED_visitor_goal');
            $table->unsignedInteger('DI_visitor_goal');
            $table->unsignedInteger('DD_visitor_goal');
            $table->unsignedInteger('DC_visitor_goal');

            $table->unsignedInteger('PO_visitor_assistance');
            $table->unsignedInteger('DFC_visitor_assistance');
            $table->unsignedInteger('LTI_visitor_assistance');
            $table->unsignedInteger('LTD_visitor_assistance');
            $table->unsignedInteger('MCD_visitor_assistance');
            $table->unsignedInteger('MC_visitor_assistance');
            $table->unsignedInteger('MI_visitor_assistance');
            $table->unsignedInteger('MD_visitor_assistance');
            $table->unsignedInteger('MCO_visitor_assistance');
            $table->unsignedInteger('EI_visitor_assistance');
            $table->unsignedInteger('ED_visitor_assistance');
            $table->unsignedInteger('DI_visitor_assistance');
            $table->unsignedInteger('DD_visitor_assistance');
            $table->unsignedInteger('DC_visitor_assistance');

            $table->unsignedInteger('PO_visitor_best_player');
            $table->unsignedInteger('DFC_visitor_best_player');
            $table->unsignedInteger('LTI_visitor_best_player');
            $table->unsignedInteger('LTD_visitor_best_player');
            $table->unsignedInteger('MCD_visitor_best_player');
            $table->unsignedInteger('MC_visitor_best_player');
            $table->unsignedInteger('MI_visitor_best_player');
            $table->unsignedInteger('MD_visitor_best_player');
            $table->unsignedInteger('MCO_visitor_best_player');
            $table->unsignedInteger('EI_visitor_best_player');
            $table->unsignedInteger('ED_visitor_best_player');
            $table->unsignedInteger('DI_visitor_best_player');
            $table->unsignedInteger('DD_visitor_best_player');
            $table->unsignedInteger('DC_visitor_best_player');

            $table->unsignedInteger('PO_visitor_unbeaten');










            $table->foreign('team_visitor_id')->references('id')->on('pro_teams');
            $table->foreign('team_local_id')->references('id')->on('pro_teams');
            $table->foreign('PO_local_id')->references('id')->on('users');
            $table->foreign('DFC_local_id')->references('id')->on('users');
            $table->foreign('LTI_local_id')->references('id')->on('users');
            $table->foreign('LTD_local_id')->references('id')->on('users');
            $table->foreign('MCD_local_id')->references('id')->on('users');
            $table->foreign('MC_local_id')->references('id')->on('users');
            $table->foreign('MI_local_id')->references('id')->on('users');
            $table->foreign('MD_local_id')->references('id')->on('users');
            $table->foreign('MCO_local_id')->references('id')->on('users');
            $table->foreign('EI_local_id')->references('id')->on('users');
            $table->foreign('ED_local_id')->references('id')->on('users');
            $table->foreign('DI_local_id')->references('id')->on('users');
            $table->foreign('DD_local_id')->references('id')->on('users');
            $table->foreign('DC_local_id')->references('id')->on('users');




            $table->foreign('PO_visitor_id')->references('id')->on('users');
            $table->foreign('DFC_visitor_id')->references('id')->on('users');
            $table->foreign('LTI_visitor_id')->references('id')->on('users');
            $table->foreign('LTD_visitor_id')->references('id')->on('users');
            $table->foreign('MCD_visitor_id')->references('id')->on('users');
            $table->foreign('MC_visitor_id')->references('id')->on('users');
            $table->foreign('MI_visitor_id')->references('id')->on('users');
            $table->foreign('MD_visitor_id')->references('id')->on('users');
            $table->foreign('MCO_visitor_id')->references('id')->on('users');
            $table->foreign('EI_visitor_id')->references('id')->on('users');
            $table->foreign('ED_visitor_id')->references('id')->on('users');
            $table->foreign('DI_visitor_id')->references('id')->on('users');
            $table->foreign('DD_visitor_id')->references('id')->on('users');
            $table->foreign('DC_visitor_id')->references('id')->on('users');


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
        Schema::drop('pro_match_league');//
    }
}