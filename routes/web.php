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

// Route::get('/', 'HomeController@welcome');
Route::get('/', 'HomeController@welcome')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/about', 'HomeController@about')->name('about');

Route::group(['prefix'=>'itp'], function(){

	Route::get('itp/create/{id?}',['as'=>'itp_create','uses'=>'InternshipController@create']);
	Route::group(['middleware'=>'auth', 'prefix'=>'applicant'], function(){

		Route::get('profile',['as'=>'itp_applicant_profile', 'uses'=>'InternshipController@userItpProfile']);
		Route::get('finprofile',['as'=>'itp_applicant_finprofile', 'uses'=>'InternshipController@finuserItpProfile']);
		Route::get('add/{id?}',['as'=>'itp_add','uses'=>'InternshipController@add_batch']);

		Route::post('save/application',['as'=>'save_application', 'uses'=> 'InternshipController@save_application']);
		Route::post('addbatch/application',['as'=>'save_batches', 'uses'=> 'InternshipController@save_batches']);		
		Route::post('update/application',['as'=>'update_application', 'uses'=> 'InternshipController@update_application']);

		// json
			Route::group(['prefix'=>'json'],function(){
			Route::get('itp',['as'=>'json_get_itp_application', 'uses'=>'InternshipController@json_get_application_datatable']);
			Route::post('delete',['as'=>'json_delete_itp_application', 'uses'=>'InternshipController@json_delete_application']);

			Route::group(['prefix'=>'resume/parts'], function(){
				Route::group(['prefix'=>'get'], function(){
					// ... get resume parts routes
					Route::get('all',['as'=>'json_get_resume', 'uses'=>'UserController@returResume']);
					Route::get('education',['as'=>'j_g_r_education', 'uses'=>'UserController@returResumeEducation']);
					Route::get('skill/categories',['as'=>'j_g_skills_categories', 'uses'=>'UserController@getLanguageCategorySkills']);
					Route::get('resumefile',['as'=>'j_g_resume_file', 'uses'=>'UserController@uploadResumeFiles']);
					Route::get('experience',['as'=>'j_g_experience', 'uses'=>'UserController@getResumeExperience']);
					Route::get('award/certificate',['as'=>'j_g_award_certificate', 'uses'=>'UserController@getResumeAwardCertificate']);
				});
				Route::group(['prefix'=>'edit'], function(){
					Route::patch('basic',['as'=>'j_e_r_p_basic', 'uses'=>'UserController@edit_resume_basic']);
					Route::patch('skills',['as'=>'j_e_r_p_skills', 'uses'=>'UserController@edit_resume_skills']);
					Route::patch('company_experience',['as'=>'j_e_r_p_company_experiences', 'uses'=>'UserController@edit_resume_company_experience']);
					Route::patch('educational_background',['as'=>'j_e_r_p_educational_background', 'uses'=>'UserController@j_e_r_p_educational_background']);
					Route::post('resumefile',['as'=>'j_g_resume_file', 'uses'=>'UserController@uploadResumeFiles']);
					Route::patch('photo',['as'=>'j_e_r_p_photo', 'uses'=>'UserController@editResumePhoto']);
					Route::patch('cover',['as'=>'j_e_r_p_cover', 'uses'=>'UserController@editCover']);
					Route::patch('meta',['as'=>'j_e_r_p_meta', 'uses'=>'UserController@edit_resume_meta']);
				});

				Route::group(['prefix'=>'delete'], function(){
					Route::delete('education',['as'=>'j_d_education', 'uses'=>'UserController@deleteEducation']);
					Route::delete('experience',['as'=>'j_d_experience', 'uses'=>'UserController@deleteExperience']);
				});

				Route::group(['prefix'=>'create'], function(){
					Route::patch('educational_background',['as'=>'j_c_r_p_educational_background', 'uses'=>'UserController@j_c_r_p_educational_background']);
					Route::patch('experience',['as'=>'j_c_r_p_experience', 'uses'=>'UserController@j_c_r_p_experience']);
				});

				Route::group(['prefix'=>'create/update'], function(){
					Route::post('education_background',['as'=>'j_create_update_ed', 'uses'=>'UserController@j_c_r_p_educational_background']);
					Route::post('experience',['as'=>'j_create_update_experience', 'uses'=>'UserController@j_c_r_p_experience']);
				});
			});
		});

		Route::group(['prefix'=>'fetch'], function(){
			Route::get('notifications',['as'=>'fetch_notifications', 'uses'=>'UserController@fetch_notifications']);
			Route::get('latest/notifications',['as'=>'fetch_latest_notifications', 'uses'=>'UserController@fetch_latest_notifications']);
		});
	});
});

Route::group(['prefix'=>'user', 'middleware'=>'auth'], function(){
	Route::get('profile', ['as'=>'user_profile', 'uses'=>'UserController@profile']);
	Route::get('resume/create', ['as'=>'resume_create', 'uses'=>'UserController@resume_create']);
	Route::get('resume/edit/{id}', ['as'=>'resume_edit', 'uses'=>'UserController@resume_edit']);
	Route::post('resume/save', ['as'=>'resume_save', 'uses'=>'UserController@resume_save']);
	Route::post('resume/save/edit', ['as'=>'resume_save_edit', 'uses'=>'UserController@resume_save_edit']);
});

// Socialite
Route::get('/redirect/{media}', 'SocialAuthController@redirect');
Route::get('/facebook/callback', 'SocialAuthController@callbackFacebook');
Route::get('/github/callback', 'SocialAuthController@callbackGithub');
Route::post('/confirm/role', 'UserController@confirm_role');

Auth::routes();

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/contact', 'ContactController@show');
Route::post('/contact',  'ContactController@mailToAdmin'); 