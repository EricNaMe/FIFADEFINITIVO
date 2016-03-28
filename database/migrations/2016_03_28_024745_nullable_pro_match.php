<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableProMatch extends Migration
{

    public function up()
    {
Schema::table('pro_match_league',function( $table){

    $table->unsignedInteger('PO_local_id')->nullable(true)->change();
    $table->unsignedInteger('DFC_local_id')->nullable(true)->change();
    $table->unsignedInteger('LTI_local_id')->nullable(true)->change();
    $table->unsignedInteger('LTD_local_id')->nullable(true)->change();
    $table->unsignedInteger('MCD_local_id')->nullable(true)->change();
    $table->unsignedInteger('MC_local_id')->nullable(true)->change();
    $table->unsignedInteger('MI_local_id')->nullable(true)->change();
    $table->unsignedInteger('MD_local_id')->nullable(true)->change();
    $table->unsignedInteger('MCO_local_id')->nullable(true)->change();
    $table->unsignedInteger('EI_local_id')->nullable(true)->change();
    $table->unsignedInteger('ED_local_id')->nullable(true)->change();
    $table->unsignedInteger('DI_local_id')->nullable(true)->change();
    $table->unsignedInteger('DD_local_id')->nullable(true)->change();
    $table->unsignedInteger('DC_local_id')->nullable(true)->change();




    $table->unsignedInteger('PO_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('DFC_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('LTI_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('LTD_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MCD_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MC_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MI_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MD_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MCO_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('EI_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('ED_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('DI_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('DD_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('DC_visitor_id')->nullable(true)->change();



});



    //
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