<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLockInscriptionsToProteams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pro_teams',function(Blueprint $table){
            $table->boolean('inscriptions_locked')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pro_teams',function(Blueprint $table){
            $table->dropColumn('inscriptions_locked');
        });
    }
}
