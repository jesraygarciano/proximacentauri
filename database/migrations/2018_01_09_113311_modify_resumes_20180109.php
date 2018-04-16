<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyResumes20180109 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->integer('university_enter_year');
            $table->integer('university_enter_month');
            $table->integer('university_graduate_year');
            $table->integer('university_graduate_month');
            $table->string('religion');
            $table->text('summary');
            $table->text('other_skills');
            $table->text('websites');
            $table->text('seminars_attended');
            $table->text('awards');
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
            $table->dropColumn('awards');
            $table->dropColumn('seminars_attended');
            $table->dropColumn('websites');
            $table->dropColumn('other_skills');
            $table->dropColumn('summary');
            $table->dropColumn('religion');
            $table->dropColumn('university_graduate_month');
            $table->dropColumn('university_graduate_year');
            $table->dropColumn('university_enter_month');
            $table->dropColumn('university_enter_year');
        });
    }
}
