<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('message');
            $table->enum('status', [
                'acepted',
                'rejected',
                'pending',
    
            ]);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('notifications');  //
    }
}
