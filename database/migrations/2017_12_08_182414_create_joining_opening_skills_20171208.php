<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoiningOpeningSkills20171208 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joining_opening_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duration');

            $table->integer('opening_id')->unsigned()->index();
            $table->foreign('opening_id')->references('id')->on('openings');

            $table->integer('opening_skill_id')->unsigned()->index();
            $table->foreign('opening_skill_id')->references('id')->on('opening_skills');

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
        Schema::drop('joining_opening_skills');
    }
}
