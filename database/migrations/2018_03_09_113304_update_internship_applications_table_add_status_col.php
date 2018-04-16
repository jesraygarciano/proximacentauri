<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInternshipApplicationsTableAddStatusCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('internship_applications',function(Blueprint $table){
            $table->string('status')->default('under_consideration');
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
        Schema::table('internship_applications',function(Blueprint $table){
            $table->dropColumn('status');
        });
    }
}
