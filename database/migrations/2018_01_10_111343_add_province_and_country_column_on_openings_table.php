<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProvinceAndCountryColumnOnOpeningsTable extends Migration
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
            $table->string('province_code');
            $table->string('country_code');
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
        Schema::table('openings',function(Blueprint $table){
            $table->dropColumn('country_code');
            $table->dropColumn('province_code');
        });
    }
}
