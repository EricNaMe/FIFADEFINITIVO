<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_team_user',function(Blueprint $table){
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pro_team_id');
            $table->enum('status',[
                'accepted',
                'rejected',
                'pending',
            ]);


            $table->unique(['pro_team_id','position','user_id']);

            $table->enum('position',[
                'PO',
                'DFC',
                'LTI',
                'LTD',
                'MCD',
                'MC',
                'MI',
                'MD',
                'MCO',
                'EI',
                'DD',
                'DC',
                'DT',
                'DT2',
                'DT3',
                'BANCA1',
                'BANCA2',
            ]);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pro_team_id')->references('id')->on('pro_teams');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pro_team_user');
    }
}
