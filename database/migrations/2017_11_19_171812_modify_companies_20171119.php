<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCompanies20171119 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('in_charge');
            $table->string('ceo_name');
            $table->string('postal');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('country');
            $table->integer('number_of_employee');
            $table->date('established_at');
            $table->string('facebook_url');
            $table->string('twitter_url');
            $table->string('company_logo');
            $table->string('background_photo');
            $table->text('company_introduction');
            $table->text('what');
            $table->text('what_photo1');
            $table->text('what_photo1_explanation');
            $table->text('what_photo2');
            $table->text('what_photo2_explanation');
            $table->string('bill_company_name');
            $table->string('bill_postal');
            $table->string('bill_address1');
            $table->string('bill_address2');
            $table->string('bill_city');
            $table->string('bill_country');
            $table->integer('user_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('in_charge');
            $table->dropColumn('ceo_name');
            $table->dropColumn('postal');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('number_of_employee');
            $table->dropColumn('established_at');
            $table->dropColumn('facebook_url');
            $table->dropColumn('twitter_url');
            $table->dropColumn('company_logo');
            $table->dropColumn('background_photo');
            $table->dropColumn('company_introduction');
            $table->dropColumn('what');
            $table->dropColumn('what_photo1');
            $table->dropColumn('what_photo1_explanation');
            $table->dropColumn('what_photo2');
            $table->dropColumn('what_photo2_explanation');
            $table->dropColumn('bill_company_name');
            $table->dropColumn('bill_postal');
            $table->dropColumn('bill_address1');
            $table->dropColumn('bill_address2');
            $table->dropColumn('bill_city');
            $table->dropColumn('bill_country');

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');


        });
    }
}
