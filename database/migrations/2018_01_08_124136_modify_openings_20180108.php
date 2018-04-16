<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyOpenings20180108 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('openings', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->string('postal');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('country');
            $table->dateTime('from_post');
            $table->dateTime('until_post');
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
            $table->dropColumn('until_post');
            $table->dropColumn('from_post');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('address2');
            $table->dropColumn('address1');
            $table->dropColumn('postal');
            $table->string('address');
        });
    }
}
