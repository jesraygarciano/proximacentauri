<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyOpenings20171113 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('openings', function (Blueprint $table) {
            $table->string('title');
            $table->date('start_at');
            $table->date('end_at');
            $table->boolean('is_active')->default(1);
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
            $table->dropColumn('title');
            $table->dropColumn('start_at');
            $table->dropColumn('end_at');
            $table->dropColumn('is_active');
        });
    }
}
