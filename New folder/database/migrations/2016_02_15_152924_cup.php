<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('cups', function (Blueprint $table) {
           $table->increments('id');

            $table->timestamps();
            $table->String('name')->unique();
             $table->enum('status',[
                'active',
                'inactive',
               
            ]);
            $table->integer('winner');
          
   //
    });
    
            }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('cups');
    }
}
