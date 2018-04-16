<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeenColumnOnApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('applications',function( Blueprint $table ){
            $table->integer('seen');
        });

        \DB::table('applications')->update(['seen'=>1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('applications',function( Blueprint $table ){
            $table->dropColumn('seen');
        });
    }
}
