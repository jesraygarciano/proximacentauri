<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterReferences20180109 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_references', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cr_name');
            $table->string('cr_position');
            $table->string('cr_company_or_university');
            $table->string('cr_phone_number');
            $table->string('cr_email');
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
        Schema::drop('character_references');
    }
}
