<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplications20171130 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {

            $table->increments('id');
            $table->longText('description');
            $table->boolean('is_active')->default(1);

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('opening_id')->unsigned()->index();
            $table->foreign('opening_id')->references('id')->on('openings');

            $table->integer('resume_id')->unsigned()->index();
            $table->foreign('resume_id')->references('id')->on('resumes');

            // user_idとopening_idの組み合わせの重複を許さない
            // $table->unique(['user_id', 'opening_id']);

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
        Schema::drop('applications');
        //Schema::table('applications', function (Blueprint $table) {
            //
        //});
    }
}
