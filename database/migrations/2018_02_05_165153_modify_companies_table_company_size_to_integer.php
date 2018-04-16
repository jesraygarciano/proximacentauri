<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCompaniesTableCompanySizeToInteger extends Migration
{
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('companies',function(Blueprint $table){
                $table->integer('company_size');
            });

            \DB::table('companies')->update(['company_size'=>1]);
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('companies',function(Blueprint $table){
                $table->string('company_size');
            });
        }
}
