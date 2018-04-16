<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_batches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author_id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('regitration_deadline');
            $table->text('schedule');
            $table->text('description');
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
        Schema::drop('training_batches');
    }
}
