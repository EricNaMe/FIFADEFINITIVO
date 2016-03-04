<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
           

            $table->timestamps();
            $table->String('name');
            $table->integer('points');
            $table->integer('JJ');
            $table->integer('JG');
            $table->integer('JE');
            $table->integer('JP');
            $table->integer('GF');
            $table->integer('GC');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teams');
    }
}
