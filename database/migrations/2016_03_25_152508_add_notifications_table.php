<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications',function(Blueprint $table){
            $table->dropColumn('status');
            $table->dropColumn('message');

            $table->unsignedInteger('notifiable_id');
            $table->string('notifiable_type');
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function(Blueprint $table){
            $table->dropColumn('notifiable_id');
            $table->dropColumn('notifiable_type');
            $table->dropColumn('type');

            $table->string('message');
            $table->enum('status', [
                'acepted',
                'rejected',
                'pending',
            ]);
        });
    }
}
