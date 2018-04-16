<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyResumes20171210 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->boolean('is_master')->default(0);
            $table->boolean('is_active')->default(0);
            $table->dropColumn('role');
            $table->dropColumn('f_name');
            $table->dropColumn('m_name');
            $table->dropColumn('l_name');
            $table->dropColumn('birth_date');
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
            $table->dropColumn('is_master');
            $table->dropColumn('is_active');
            $table->integer('role');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->dateTime('birth_date');
        });
    }
}
