<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProCalendario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_calendar',function(Blueprint $table){
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


            $table->foreign('visitor_id')->references('id')->on('pro_teams');
            $table->foreign('local_id')->references('id')->on('pro_teams');

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
        //
    }
}
