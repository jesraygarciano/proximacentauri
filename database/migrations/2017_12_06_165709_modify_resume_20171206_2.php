<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyResume201712062 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('tel');
            $table->string('university');
            $table->string('graduate_flag');
            $table->string('program_of_study');
            $table->string('field_of_study');
            $table->string('gender');
            $table->string('postal');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('country');
            $table->string('phone_number');
            $table->string('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->string('address');
            $table->string('tel');
            $table->dropColumn('university');
            $table->dropColumn('graduate_flag');
            $table->dropColumn('program_of_study');
            $table->dropColumn('field_of_study');
            $table->dropColumn('gender');
            $table->dropColumn('postal');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('phone_number');
            $table->dropColumn('photo');
        });
    }
}
