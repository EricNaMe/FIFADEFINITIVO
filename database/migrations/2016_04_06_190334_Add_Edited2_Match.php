<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEdited2Match extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pro_match_league',function(Blueprint $table){

            $table->unsignedInteger('edited_match_local');
            $table->unsignedInteger('edited_match_visitor');



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

            $table->dropColumn('edited_match_local');
            $table->dropColumn('edited_match_visitor');
        });
    }
}
