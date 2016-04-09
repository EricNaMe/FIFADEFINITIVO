<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewPositionsToMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('pro_match_league',function(Blueprint $table){

            $table->unsignedInteger('DFC2_local_id');
            $table->unsignedInteger('DFC3_local_id');
            $table->unsignedInteger('MCD2_local_id');
            $table->unsignedInteger('MVI_local_id');
            $table->unsignedInteger('MVD_local_id');
            $table->unsignedInteger('MC2_local_id');
            $table->unsignedInteger('MCO2_local_id');
            
            $table->unsignedInteger('DFC2_local_yellow');
            $table->unsignedInteger('DFC3_local_yellow');
            $table->unsignedInteger('MCD2_local_yellow');
            $table->unsignedInteger('MVI_local_yellow');
            $table->unsignedInteger('MVD_local_yellow');
            $table->unsignedInteger('MC2_local_yellow');
            $table->unsignedInteger('MCO2_local_yellow');
            
            $table->unsignedInteger('DFC2_local_red');
            $table->unsignedInteger('DFC3_local_red');
            $table->unsignedInteger('MCD2_local_red');
            $table->unsignedInteger('MVI_local_red');
            $table->unsignedInteger('MVD_local_red');
            $table->unsignedInteger('MC2_local_red');
            $table->unsignedInteger('MCO2_local_red');
            
            $table->unsignedInteger('DFC2_local_goal');
            $table->unsignedInteger('DFC3_local_goal');
            $table->unsignedInteger('MCD2_local_goal');
            $table->unsignedInteger('MVI_local_goal');
            $table->unsignedInteger('MVD_local_goal');
            $table->unsignedInteger('MC2_local_goal');
            $table->unsignedInteger('MCO2_local_goal');
            
            $table->unsignedInteger('DFC2_local_assistance');
            $table->unsignedInteger('DFC3_local_assistance');
            $table->unsignedInteger('MCD2_local_assistance');
            $table->unsignedInteger('MVI_local_assistance');
            $table->unsignedInteger('MVD_local_assistance');
            $table->unsignedInteger('MC2_local_assistance');
            $table->unsignedInteger('MCO2_local_assistance');
            
            $table->unsignedInteger('DFC2_local_best_player');
            $table->unsignedInteger('DFC3_local_best_player');
            $table->unsignedInteger('MCD2_local_best_player');
            $table->unsignedInteger('MVI_local_best_player');
            $table->unsignedInteger('MVD_local_best_player');
            $table->unsignedInteger('MC2_local_best_player');
            $table->unsignedInteger('MCO2_local_best_player');
            
            
            
            
            $table->unsignedInteger('DFC2_visitor_id');
            $table->unsignedInteger('DFC3_visitor_id');
            $table->unsignedInteger('MCD2_visitor_id');
            $table->unsignedInteger('MVI_visitor_id');
            $table->unsignedInteger('MVD_visitor_id');
            $table->unsignedInteger('MC2_visitor_id');
            $table->unsignedInteger('MCO2_visitor_id');
            
            
            
            
            $table->unsignedInteger('DFC2_visitor_yellow');
            $table->unsignedInteger('DFC3_visitor_yellow');
            $table->unsignedInteger('MCD2_visitor_yellow');
            $table->unsignedInteger('MVI_visitor_yellow');
            $table->unsignedInteger('MVD_visitor_yellow');
            $table->unsignedInteger('MC2_visitor_yellow');
            $table->unsignedInteger('MCO2_visitor_yellow');
            
            $table->unsignedInteger('DFC2_visitor_red');
            $table->unsignedInteger('DFC3_visitor_red');
            $table->unsignedInteger('MCD2_visitor_red');
            $table->unsignedInteger('MVI_visitor_red');
            $table->unsignedInteger('MVD_visitor_red');
            $table->unsignedInteger('MC2_visitor_red');
            $table->unsignedInteger('MCO2_visitor_red');
            
            $table->unsignedInteger('DFC2_visitor_goal');
            $table->unsignedInteger('DFC3_visitor_goal');
            $table->unsignedInteger('MCD2_visitor_goal');
            $table->unsignedInteger('MVI_visitor_goal');
            $table->unsignedInteger('MVD_visitor_goal');
            $table->unsignedInteger('MC2_visitor_goal');
            $table->unsignedInteger('MCO2_visitor_goal');
            
            $table->unsignedInteger('DFC2_visitor_assistance');
            $table->unsignedInteger('DFC3_visitor_assistance');
            $table->unsignedInteger('MCD2_visitor_assistance');
            $table->unsignedInteger('MVI_visitor_assistance');
            $table->unsignedInteger('MVD_visitor_assistance');
            $table->unsignedInteger('MC2_visitor_assistance');
            $table->unsignedInteger('MCO2_visitor_assistance');
            
            $table->unsignedInteger('DFC2_visitor_best_player');
            $table->unsignedInteger('DFC3_visitor_best_player');
            $table->unsignedInteger('MCD2_visitor_best_player');
            $table->unsignedInteger('MVI_visitor_best_player');
            $table->unsignedInteger('MVD_visitor_best_player');
            $table->unsignedInteger('MC2_visitor_best_player');
            $table->unsignedInteger('MCO2_visitor_best_player');




    

         
         
         });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
         Schema::table('pro_match_league',function(Blueprint $table){
         $table->dropColumn('DFC2_local_yellow');
         $table->dropColumn('DFC3_local_yellow');
         $table->dropColumn('MCD2_local_yellow');
         $table->dropColumn('MVI_local_yellow');
         $table->dropColumn('MVD_local_yellow');
         $table->dropColumn('MC2_local_yellow');
         $table->dropColumn('MCO2_local_yellow');
        
         $table->dropColumn('DFC2_visitor_yellow');
         $table->dropColumn('DFC3_visitor_yellow');
         $table->dropColumn('MCD2_visitor_yellow');
         $table->dropColumn('MVI_visitor_yellow');
         $table->dropColumn('MVD_visitor_yellow');
         $table->dropColumn('MC2_visitor_yellow');
         $table->dropColumn('MCO2_visitor_yellow');
         
         $table->dropColumn('DFC2_local_red');
         $table->dropColumn('DFC3_local_red');
         $table->dropColumn('MCD2_local_red');
         $table->dropColumn('MVI_local_red');
         $table->dropColumn('MVD_local_red');
         $table->dropColumn('MC2_local_red');
         $table->dropColumn('MCO2_local_red');
        
         $table->dropColumn('DFC2_visitor_red');
         $table->dropColumn('DFC3_visitor_red');
         $table->dropColumn('MCD2_visitor_red');
         $table->dropColumn('MVI_visitor_red');
         $table->dropColumn('MVD_visitor_red');
         $table->dropColumn('MC2_visitor_red');
         $table->dropColumn('MCO2_visitor_red');
         
                  
         $table->dropColumn('DFC2_local_goal');
         $table->dropColumn('DFC3_local_goal');
         $table->dropColumn('MCD2_local_goal');
         $table->dropColumn('MVI_local_goal');
         $table->dropColumn('MVD_local_goal');
         $table->dropColumn('MC2_local_goal');
         $table->dropColumn('MCO2_local_goal');
        
         $table->dropColumn('DFC2_visitor_goal');
         $table->dropColumn('DFC3_visitor_goal');
         $table->dropColumn('MCD2_visitor_goal');
         $table->dropColumn('MVI_visitor_goal');
         $table->dropColumn('MVD_visitor_goal');
         $table->dropColumn('MC2_visitor_goal');
         $table->dropColumn('MCO2_visitor_goal');
         
                  
         $table->dropColumn('DFC2_local_assistance');
         $table->dropColumn('DFC3_local_assistance');
         $table->dropColumn('MCD2_local_assistance');
         $table->dropColumn('MVI_local_assistance');
         $table->dropColumn('MVD_local_assistance');
         $table->dropColumn('MC2_local_assistance');
         $table->dropColumn('MCO2_local_assistance');
        
         $table->dropColumn('DFC2_visitor_assistance');
         $table->dropColumn('DFC3_visitor_assistance');
         $table->dropColumn('MCD2_visitor_assistance');
         $table->dropColumn('MVI_visitor_assistance');
         $table->dropColumn('MVD_visitor_assistance');
         $table->dropColumn('MC2_visitor_assistance');
         $table->dropColumn('MCO2_visitor_assistance');
         
                  
         $table->dropColumn('DFC2_local_best_player');
         $table->dropColumn('DFC3_local_best_player');
         $table->dropColumn('MCD2_local_best_player');
         $table->dropColumn('MVI_local_best_player');
         $table->dropColumn('MVD_local_best_player');
         $table->dropColumn('MC2_local_best_player');
         $table->dropColumn('MCO2_local_best_player');
        
         $table->dropColumn('DFC2_visitor_best_player');
         $table->dropColumn('DFC3_visitor_best_player');
         $table->dropColumn('MCD2_visitor_best_player');
         $table->dropColumn('MVI_visitor_best_player');
         $table->dropColumn('MVD_visitor_best_player');
         $table->dropColumn('MC2_visitor_best_player');
         $table->dropColumn('MCO2_visitor_best_player');
         

     
         
         $table->dropColumn('DFC2_visitor_id');
         $table->dropColumn('DFC3_visitor_id');
         $table->dropColumn('MCD2_visitor_id');
         $table->dropColumn('MVI_visitor_id');
         $table->dropColumn('MVD_visitor_id');
         $table->dropColumn('MC2_visitor_id');
         $table->dropColumn('MCO2_visitor_id');
         
         $table->dropColumn('DFC2_local_id');
         $table->dropColumn('DFC3_local_id');
         $table->dropColumn('MCD2_local_id');
         $table->dropColumn('MVI_local_id');
         $table->dropColumn('MVD_local_id');
         $table->dropColumn('MC2_local_id');
         $table->dropColumn('MCO2_local_id');
         
           });
        
    }
}
