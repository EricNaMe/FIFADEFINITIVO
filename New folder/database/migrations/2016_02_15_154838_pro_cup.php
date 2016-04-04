<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProCup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_cups', function (Blueprint $table) {
            $table->increments('id');

            $table->timestamps();
            $table->String('name')->unique();
           
              $table->enum('status',[
                'active',
                'inactive',
               
            ]);
              
             $table->integer('winner');
             $table->integer('number_teams');



          


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('pro_cups'); //
    }
}
