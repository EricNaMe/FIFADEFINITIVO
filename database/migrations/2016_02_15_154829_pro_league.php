<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProLeague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pro_leagues', function (Blueprint $table) {
           $table->increments('id');

            $table->timestamps();
            $table->String('name')->unique();
  
            $table->integer('points');
            $table->integer('JJ');
            $table->integer('JG');
            $table->integer('JE');
            $table->integer('JP');
            $table->integer('GF');
            $table->integer('GC'); 
            $table->integer('number_match');//


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pro_leagues');//
    }
}
