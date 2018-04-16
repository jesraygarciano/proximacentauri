<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoiningTableForHiringNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('opening_notifications', function( Blueprint $table ){
            $table->increments('id');

            $table->integer('opening_id')->unsigned()->index();
            $table->foreign('opening_id')->references('id')->on('openings');

            $table->integer('user_id')->unsigned()->index();;
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('company_id')->unsigned()->index();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->integer('seen');

            $table->timeStamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('opening_notifications');
    }
}
