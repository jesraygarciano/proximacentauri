<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('openings', function (Blueprint $table) {
            $table->integer('hiring_type');
            $table->integer('featured_status');
            $table->integer('salary_from');
            $table->integer('salary_to');
            $table->string('salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('openings', function (Blueprint $table) {
            $table->dropColumn('salary');
            $table->dropColumn('salary_to');
            $table->dropColumn('salary_from');
            $table->dropColumn('featured_status');
            $table->dropColumn('hiring_type');
        });
    }
}
