<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeenColumnOnScoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('scouts',function( Blueprint $table ){
            $table->integer('seen')->after('company_id');
        });

        \DB::table('scouts')->update(['seen'=>1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('scouts',function( Blueprint $table ){
            $table->dropColumn('seen');
        });
    }
}
