<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInternshipApplicationsTableAddBatchId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('internship_applications', function( Blueprint $table ){
            $table->integer('training_batch_id');
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
        Schema::table('internship_applications', function( Blueprint $table ){
            $table->dropColumn('training_batch_id');
        });
    }
}
