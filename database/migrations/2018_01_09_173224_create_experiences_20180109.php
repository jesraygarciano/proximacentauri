<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiences20180109 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ex_from_year');
            $table->integer('ex_from_month');
            $table->integer('ex_to_year');
            $table->integer('ex_to_month');
            $table->string('ex_company');
            $table->string('ex_postion');
            $table->text('ex_explanation');
            $table->integer('resume_id')->unsigned()->index();
            $table->timestamps();

            // foreign key
            $table->foreign('resume_id')->references('id')->on('resumes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('experiences');
    }
}
