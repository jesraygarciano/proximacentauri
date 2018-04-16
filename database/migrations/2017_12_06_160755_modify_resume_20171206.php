<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyResume20171206 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->renameColumn('intern_id', 'user_id');
            $table->renameColumn('first_name', 'f_name');
            $table->renameColumn('last_name', 'l_name');
            $table->renameColumn('birth', 'birth_date');
            $table->string('m_name');
            $table->longText('experience');
            $table->integer('role');
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
            $table->renameColumn('user_id', 'intern_id');
            $table->renameColumn('f_name', 'first_name');
            $table->renameColumn('l_name', 'last_name');
            $table->renameColumn('birth_date', 'birth');
            $table->dropColumn('m_name');
            $table->dropColumn('experience');
            $table->dropColumn('role');
        });
    }
}
