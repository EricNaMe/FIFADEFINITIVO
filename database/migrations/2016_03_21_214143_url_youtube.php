<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UrlYoutube extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('url_youtube', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 80);
            $table->string('url');
            $table->timestamps();          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('url_youtube');
    }
}
