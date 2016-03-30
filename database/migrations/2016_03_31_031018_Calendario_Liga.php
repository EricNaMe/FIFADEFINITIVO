<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalendarioLiga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_league',function(Blueprint $table){
            $table->increments('id');

            $table->timestamps();



            $table->enum('status',[
                'active',
                'inactive',

            ]);


            $table->unsignedInteger('local_id');
            $table->unsignedInteger('visitor_id');
            $table->unsignedInteger('league_id');
            $table->integer('jornada');
            $table->unsignedInteger('match_id')->nullable(true);


            $table->foreign('match_id')->references('id')->on('match_league');


            $table->foreign('visitor_id')->references('id')->on('teams');
            $table->foreign('local_id')->references('id')->on('teams');

            $table->foreign('league_id')->references('id')->on('leagues');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calendar_league');  //
    }
}
