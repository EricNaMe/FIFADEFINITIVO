<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableNewPositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
      Schema::table('pro_match_league',function(Blueprint $table){  
    $table->unsignedInteger('DFC2_local_id')->nullable(true)->change();
    $table->unsignedInteger('DFC3_local_id')->nullable(true)->change();
    $table->unsignedInteger('MCD2_local_id')->nullable(true)->change();
    $table->unsignedInteger('MVI_local_id')->nullable(true)->change();
    $table->unsignedInteger('MVD_local_id')->nullable(true)->change();
    $table->unsignedInteger('MC2_local_id')->nullable(true)->change();
    $table->unsignedInteger('MCO2_local_id')->nullable(true)->change();
    
    $table->unsignedInteger('DFC2_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('DFC3_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MCD2_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MVI_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MVD_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MC2_visitor_id')->nullable(true)->change();
    $table->unsignedInteger('MCO2_visitor_id')->nullable(true)->change();
    
   
    
         });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
