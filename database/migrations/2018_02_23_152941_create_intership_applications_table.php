<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntershipApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('internship_applications', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->text('objectives');
            $table->string('school');
            $table->string('course');
            $table->date('preffered_training_date');
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
        //
        Schema::drop('internship_applications');
    }
}
