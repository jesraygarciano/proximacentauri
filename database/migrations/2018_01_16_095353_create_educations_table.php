<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ed_university');
            $table->string('ed_program_of_study');
            $table->string('ed_field_of_study');
            $table->string('ed_country');
            $table->string('ed_city');
            $table->integer('ed_from_year');
            $table->integer('ed_from_month');
            $table->integer('ed_to_year');
            $table->integer('ed_to_month');
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
        Schema::drop('educations');
    }
}
