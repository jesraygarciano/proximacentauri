<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsers20171124 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role');
            $table->string('university');
            $table->string('graduate_flag');
            $table->string('program_of_study');
            $table->string('field_of_study');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('l_name');
            $table->string('postal');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('country');
            $table->string('phone_number');
            $table->string('photo');
            $table->longText('objective');
            $table->boolean('is_active')->default(1);

            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('university');
            $table->dropColumn('graduate_flag');
            $table->dropColumn('program_of_study');
            $table->dropColumn('field_of_study');
            $table->dropColumn('birth_date');
            $table->dropColumn('gender');
            $table->dropColumn('f_name');
            $table->dropColumn('m_name');
            $table->dropColumn('l_name');
            $table->dropColumn('postal');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('phone_number');
            $table->dropColumn('photo');
            $table->dropColumn('objective');
            $table->dropColumn('is_active')->default(1);

            $table->string('name');
        });
    }
}
