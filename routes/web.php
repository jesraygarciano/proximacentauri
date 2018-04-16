<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// this route group is for the messaging functionality
Route::group(['prefix'=>'messaging', 'middleware'=>'auth'], function(){
	Route::get('index',function(){
		return view('messaging.index');
	});

	// ajax requests
	Route::group(['prefix'=>'json'], function(){
		Route::get('fetch/user/messages', ['as'=>'json_return_user_messages', 'uses'=>'MessagerController@json_return_user_messages']);
		Route::get('fetch/chatable/users', ['as'=>'json_return_chatable_users', 'uses'=>'MessagerController@json_return_chatable_users']);
		Route::get('load/previews/messages', ['as'=>'json_fetch_previews_messages', 'uses'=>'MessagerController@json_fetch_previews_messages']);
		Route::get('search/contacts', ['as'=>'json_search_contact', 'uses'=>'MessagerController@json_search_contact']);
		Route::post('save/sent/message', ['as'=>'json_save_sent_message', 'uses'=>'MessagerController@json_save_sent_message']);
		Route::post('mark/message/seen', ['as'=>'json_mark_message_seen', 'uses'=>'MessagerController@json_mark_message_seen']);
		Route::post('request/contact', ['as'=>'json_request_contact', 'uses'=>'MessagerController@json_request_contact']);
		Route::post('accept/contact', ['as'=>'json_accept_contact', 'uses'=>'MessagerController@json_accept_contact']);
	});
});


// this route group is for the intership trainig program management functionality
Route::group(['prefix'=>'itp', 'middleware'=>'auth'],function(){

	Route::get('landing_page', 'InternshipApplicationController@landing_page');

	Route::group(['prefix'=>'applicant'],function(){

		Route::get('profile',['as'=>'applicant_profile','uses'=>'InternshipApplicationController@profile']);
		Route::get('edit',['as'=>'edit','uses'=>'InternshipApplicationController@edit']);
		
		// Route::get('index',['as'=>'app','uses'=>'InternshipApplicationController@create']);
		Route::get('create',['as'=>'itp_create','uses'=>'InternshipApplicationController@create']);
		Route::get('list/applications',['as'=>'list_itp_applications','uses'=>'InternshipApplicationController@create']);

		Route::post('save/application',['as'=>'save_application', 'uses'=> 'InternshipApplicationController@save_application']);
		Route::post('update/application',['as'=>'update_application', 'uses'=> 'InternshipApplicationController@update_application']);

		// jsons
		Route::group(['prefix'=>'json'],function(){
			Route::get('itp',['as'=>'json_get_itp_application', 'uses'=>'InternshipApplicationController@json_get_application_datatable']);			
		});
	});

	Route::group(['prefix'=>'management', 'middleware'=>'onlymanagement'],function(){
		Route::get('index',['as'=>'itp_management_index', 'uses'=>'InternshipApplicationController@manage_batch_index']);
		Route::get('batch/create/{id?}',['as'=>'get_create_batch', 'uses'=>'InternshipApplicationController@getBatchCreate']);
		Route::post('batch/create',['as'=>'post_create_batch', 'uses'=>'InternshipApplicationController@postBatchCreate']);

		// jsons
		Route::group(['prefix'=>'json'],function(){
			Route::get('get/batches',['as'=>'json_get_batches_datatable', 'uses'=>'InternshipApplicationController@json_get_batches_datatable']);
			Route::get('get/applications',['as'=>'json_get_applicants_datatable', 'uses'=>'InternshipApplicationController@json_get_applicants_datatable']);
			Route::post('delete/batch',['as'=>'json_delete_batch', 'uses'=>'InternshipApplicationController@json_delete_batch']);
			Route::post('batch/isactive/edit',['as'=>'json_edit_btach_is_active', 'uses'=>'InternshipApplicationController@json_edit_btach_is_active']);
			Route::post('application/status/update',['as'=>'json_update_application_status', 'uses'=>'InternshipApplicationController@json_update_application_status']);
		});
	});

	// json
	Route::get('view/application', ['as'=>'json_view_application', 'uses'=>'InternshipApplicationController@json_view_application']);
});

Route::group(['prefix'=>'hiring'], function(){
	Route::get('index',['as'=>'hiring_index', 'uses'=>'PortalController@hiring_portal']);
});


// this route group is for notifications functionality (scout, applications and new opening notifications)
Route::group(['middleware'=>'auth', 'prefix'=>'user'], function(){
	Route::get('index',['as'=>'user_profile','uses'=>'UserController@index']);
	Route::get('notifications',['as'=>'user_notifications','uses'=>'UserController@notifications']);

	// ajax requests
	Route::group(['prefix'=>'json/get/notification'],function(){
		Route::get('scouts',['as'=>'json_get_scout_notification', 'uses'=>'UserController@json_get_scout_notification']);
		Route::get('applications',['as'=>'json_get_application_notification', 'uses'=>'UserController@json_get_application_notification']);
		Route::get('openings',['as'=>'json_get_opening_notification', 'uses'=>'UserController@json_get_opening_notification']);
		Route::get('stats',['as'=>'json_get_stat_notification', 'uses'=>'UserController@json_get_stat_notification']);
	});
});

// Socialite
Route::get('/redirect/{media}', 'SocialAuthController@redirect');
Route::get('/facebook/callback', 'SocialAuthController@callbackFacebook');
Route::get('/github/callback', 'SocialAuthController@callbackGithub');
Route::post('/confirm/role', 'UserController@confirm_role');


Route::get('/', ['as' => 'portals.general_portal', 'uses' => 'PortalController@general_portal']);
Route::get('portals/general_portal', ['as' => 'portals.general_portal', 'uses' => 'PortalController@general_portal']);


// uelmar map region search route
Route::get('portals/search_ph_region/{code}', ['as' => 'portal_ph_region_search', 'uses' => 'PortalController@portal_ph_region_search']);
Route::get('portals/search_ph_division/{code}', ['as' => 'portal_ph_division_search', 'uses' => 'PortalController@portal_ph_division_search']);
Route::get('portals/search_international/{code}', ['as' => 'portal_international_search', 'uses' => 'PortalController@portal_international_search']);

// Management Portal
Route::get('management/users','ManagementController@user')->name('datatables');
Route::get('management/companies','ManagementController@company')->name('datatables');
Route::get('management/openings','ManagementController@opening')->name('datatables');
Route::get('management/userdata','ManagementController@userData')->name('datatables.users');
Route::get('management/companydata','ManagementController@companyData')->name('datatables.companies');
Route::get('management/openingdata','ManagementController@openingData')->name('datatables.openings');


Route::get('portals/hiring-portal', 'PortalController@hiring_portal');


Route::get('hiring_portal/user_index', 'HiringPortalController@user_index');


Route::get('hiring_portal/user_index_show/{id}', ['as' => 'hiring_portal.user_index_show', 'uses' => 'HiringPortalController@user_index_show']);


Route::get('hiring_portal', ['as' => 'hiring_portal', 'uses' => 'HiringPortalController@index']);

// save applicant route
Route::post('save_applicant_index/{applicant_saved_id}', ['as' => 'save_applicant_index', 'uses' => 'HiringPortalController@save_applicant_index']);

Route::delete('unsave_applicant_index/{applicant_saved_id}', ['as' => 'unsave_applicant_index', 'uses' => 'HiringPortalController@unsave_applicant_index']);

Route::get('saved/applicants/list','HiringPortalController@user_bookmark_lists');

Route::get('hiring_portal/show/{company_id}', ['as' => 'hiring_portal.show', 'uses' => 'HiringPortalController@show']);
Route::post('hiring_portal/show/{company_id}', ['as' => 'hiring_portal.show', 'uses' => 'HiringPortalController@show']);

Route::get('hiring_portal/application/{id}', ['as' => 'hiring_portal.application_detail', 'uses' => 'HiringPortalController@application_detail']);

Route::get('companies/companysearch', 'CompaniesController@index');

Route::get('companies', ['as' => 'companies.index', 'uses' => 'CompaniesController@index']);
Route::get('companies/create', ['as' => 'companies.create', 'uses' => 'CompaniesController@create']);
Route::get('companies/{id}', ['as' => 'companies.show', 'uses' => 'CompaniesController@show']);
Route::post('companies', ['as' => 'companies.store', 'uses' => 'CompaniesController@store']);
Route::get('companies/{id}/edit', ['as' => 'companies.edit', 'uses' => 'CompaniesController@edit']);
Route::patch('companies/{id}', ['as' => 'companies.update', 'uses' => 'CompaniesController@update']);
Route::delete('companies/{id}', ['as' => 'companies.destroy', 'uses' => 'CompaniesController@destroy']);

// Application routes...
Route::get('applications/applied_index', ['as' => 'applications.applied_index', 'uses' => 'ApplicationController@applied_index']);
Route::get('applications/create/{opening_id}', ['as' => 'applications.create', 'uses' => 'ApplicationController@create']);
Route::get('applications/{id}', ['as' => 'applications.show', 'uses' => 'ApplicationController@show']);
Route::post('applications/store', ['as' => 'applications.store', 'uses' => 'ApplicationController@store']);

Route::get('resumes/create', ['as' => 'resumes.create', 'uses' => 'ResumesController@create']);
Route::get('resumes/show', ['as' => 'resumes.show', 'uses' => 'ResumesController@show']);
Route::post('resumes', ['as' => 'resumes.store', 'uses' => 'ResumesController@store']);
Route::get('resumes/{id}/edit', ['as' => 'resumes.edit', 'uses' => 'ResumesController@edit']);
Route::patch('resumes/{id}', ['as' => 'resumes.update', 'uses' => 'ResumesController@update']);

Route::get('scouts/company_scout', 'ScoutsController@company_scout');
Route::get('scouts/company_scout/{id}', ['as' => 'scouts.company_scout_note', 'uses' => 'ScoutsController@company_scout_note']);
Route::get('scouts/create/{scout_user_id}', ['as' => 'scouts.create', 'uses' => 'ScoutsController@create']);
Route::post('scouts', ['as' => 'scouts.store', 'uses' => 'ScoutsController@store']);


Route::get('contact', 'PagesController@contact');
Route::get('about', 'PagesController@about');

Route::get('openings/general_portal','OpeningsController@general_portal');

Route::get('openings', ['as' => 'openings.index', 'uses' => 'OpeningsController@index']);

Route::get('bookmarked/list','OpeningsController@bookmark_lists');

Route::get('search/opening/use/language',['as'=>'search_opening_with_language', 'uses'=>'OpeningsController@search_opening_with_language']);

Route::post('openings_bookmark/{opening_id}', ['as' => 'openings.bookmark_openings_index', 'uses' => 'OpeningsController@bookmark_openings_index']);

Route::delete('openings_unbookmark/{opening_id}', ['as' => 'openings.unbookmark_openings_index', 'uses' => 'OpeningsController@unbookmark_openings_index']);

// ajax functions (Uelmar)
Route::post('edit_opening_bookmark', ['as' => 'edit_opening_bookmark', 'uses' => 'OpeningsController@edit_opening_bookmark']);
Route::post('edit_company_follow', ['as' => 'edit_company_follow', 'uses' => 'CompaniesController@edit_company_follow']);
Route::post('edit_save_applicant', ['as' => 'edit_save_applicant', 'uses' => 'HiringPortalController@edit_save_applicant']);


Route::get('openings/create/{company_id?}','OpeningsController@create');
Route::get('openings/edit/{company_id?}','OpeningsController@edit');
Route::post('openings/{id}', ['as' => 'openings.update', 'uses' => 'OpeningsController@update']);

Route::get('openings/{id}','OpeningsController@show');
Route::post('openings', ['as' => 'openings.store', 'uses' => 'OpeningsController@store']);

//Jesray programming language tag route
Route::get('portals/search_international/{code}', ['as' => 'portal_international_search', 'uses' => 'PortalController@portal_international_search']);

// FOLLOW COMPANIES
Route::get('followed/list','CompaniesController@follow_company_lists');
Route::post('companies_follow/{company_id}', ['as' => 'companies.follow_companies_index', 'uses' => 'CompaniesController@follow_companies_index']);
Route::delete('companies_unfollow/{company_id}', ['as' => 'companies.unfollow_companies_index', 'uses' => 'CompaniesController@unfollow_companies_index']);

Route::get('auth/register/{status}', 'Auth\RegisterController@judge');
Route::post('auth/register/{status}', 'Auth\RegisterController@register');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// link for account verification
Route::get('verify/account',['as'=>'verify/account','uses'=>'Auth\AuthController@verify_account']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
