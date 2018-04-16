<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalaryRangeToOpenings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('openings',function(Blueprint $table){
            $table->integer('salary_range');
        });

        \DB::table('openings')->update(['salary_range'=>3]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('openings',function(Blueprint $table){
            $table->dropColumn('salary_range');
        });
    }
}
