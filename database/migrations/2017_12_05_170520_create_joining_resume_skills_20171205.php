<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoiningResumeSkills20171205 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joining_resume_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('duration');

            $table->integer('resume_id')->unsigned()->index();
            $table->foreign('resume_id')->references('id')->on('resumes');

            $table->integer('resume_skill_id')->unsigned()->index();
            $table->foreign('resume_skill_id')->references('id')->on('resume_skills');

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
        Schema::drop('joining_resume_skills');
    }
}
