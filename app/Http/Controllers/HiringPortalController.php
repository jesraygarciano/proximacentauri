<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\Common;
use App\Company;
use App\Opening;
use App\Application;
use App\User;
use App\Resume;
use Auth;

class HiringPortalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
        $this->middleware('onlyhiring', ['except' => ['index','edit_save_applicant','show','save_applicant_index','unsave_applicant_index','user_bookmark_lists','json_update_saved_applicants']]);
        $this->middleware('navbar');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = \DB::table('provinces')->get();
        $countries = \DB::table('countries')->get();

        $companies_show = Company::latest('created_at')->where('is_active', 1)->where('user_id', Auth::user()->id)->first();

        // redirect if without existing companies
        if(!$companies_show) return redirect('companies/create');

        $companies = Company::latest('created_at')->where('is_active', 1)->where('user_id', Auth::user()->id)->get();

        if(count($companies) > 0){

            $openings = Opening::latest('created_at')->where('is_active', 1)->where('company_id', $companies_show->id)->get();

            $opening_ids = array();
            for ($i=0; $i < count($openings) ; $i++) {
                $opening_ids[] = $openings[$i]->id;
            }
            $applications = Application::latest('created_at')->where('is_active', 1)->wherein('opening_id', $opening_ids)->get();

            $applicant_ids = array();
            for ($i=0; $i < count($applications) ; $i++) {
                $applicant_ids[] = $applications[$i]->user_id;
            }

            $applicants = User::wherein('id', $applicant_ids)->get();

        } else {
            // $companies_show = array();
            // $companies = array();
            $openings = array();
            $applications = array();
            $applicants = array();
        }

        return view('hiring_portal.index', compact('provinces','countries','companies_show', 'companies', 'openings', 'applications', 'applicants'));
    }

    public function application_detail($id)
    {
        $application = Application::findOrFail($id);
        $resume = Resume::findOrFail($application->resume_id);
        $companies = Opening::findOrFail($application->opening_id)->company()->get();
        // dd($company_id);
        $company_id = "";
        foreach ($companies as $company) {
            $company_id = $company->id;
        }

        // dd($company_id);

        return view('hiring_portal.application_detail', compact('application', 'resume', 'company_id'));
    }

    public function save_applicant_index($applicant_saved_id)
    {

        Auth::user()->save_applicant($applicant_saved_id);

        return redirect()->back();

    }

    public function unsave_applicant_index($applicant_saved_id)
    {

        Auth::user()->unsave_applicant($applicant_saved_id);

        return redirect()->back();

    }

    public function user_bookmark_lists(){
        $applicants = Auth::user()->saved_applicants;
        return view('hiring_portal.bookmarked_list',compact('applicants'));
    }


    // this code is for add/remove saved applicants function
    public function json_update_saved_applicants(Request $requests)
    {
        // $user = User::find($requests->user_id);
        // $user->attach($requests->applicant_id);

        return ['success'=>true];
    }

    public function user_index(Request $requests)
    {

        //the users that will shown on the applicants list
        $applicants = User::query()->where('is_active', 1)->orderBy('created_at','desc');

        $provinces = \DB::table('provinces')->get();

        if($requests->applicant_search){
            $applicant_search_ids = User::where('f_name', 'like', '%'.$requests->applicant_search.'%')->pluck('id');

            $applicants->whereIn('id',$applicant_search_ids);

        }

        if($requests->languages && strlen($requests->languages[0]) > 0)
        {
            $resume_skills = \App\Resume_skill::whereIn('language',$requests->languages)->pluck('id');

            $pivot_resume_skills = \DB::table('joining_resume_skills')->whereIn('resume_skill_id',$resume_skills)->pluck('resume_id');

            $applicantes = Resume::whereIn('id',$pivot_resume_skills)->pluck('user_id');

            $applicants->whereIn('id',$applicantes);

        }

        if($requests->province){
            $provinces_search = \DB::table('provinces')->whereRaw('name like "%'.$requests->province.'%" or iso_code like "%'.$requests->province.'%"')->pluck('iso_code');
            $applicants->whereIn('province_code',$provinces_search);
        }

        if($requests->gender){
            $applicants->where('gender',$requests->gender);

            /*$resume_gender = Resume::where('gender',$requests->gender)->pluck('id');
            $applicants->whereIn('gender',$resume_gender);*/

        }

        $applicants = $applicants->paginate(6);

        //getting ids of companies that auth user created.
        $companies_ids = Common::company_ids_that_user_have();

        $companies_scouted_array = array();

        for ($i=0; $i < count($applicants) ; $i++) {
            $scout_companies = $applicants[$i]->companies_that_scout_users()->withPivot('user_id', 'company_id')->get();

            $companies_array = array();
            for ($j=0; $j < count($scout_companies) ; $j++) {
                if (in_array($scout_companies[$j]->id, $companies_ids)) {
                    $companies_array[] = $scout_companies[$j];
                }
            }
            // dd($companies_array);
            if ($i == 0) {
                $companies_scouted_array = array($applicants[$i]->id => $companies_array);
            } else {
                $companies_scouted_array += array($applicants[$i]->id => $companies_array);
            }
            // dd($scout_companies_screened);
            // dd($scout_companies);
        }

        return view('hiring_portal.user_index', compact('applicants','provinces','companies_scouted_array'));
        // return view('hiring_portal.user_index', compact('applicants'));
    }


    // Save applicant
    public function edit_save_applicant(Request $request){

        if(Auth::user()->is_applicant_saved($request->applicant_saved_id)){
            Auth::user()->unsave_applicant($request->applicant_saved_id);
            return ['result'=>'unsaved','saves'=>User::find($request->applicant_saved_id)->scouters->count()];
        }
        else{
            Auth::user()->save_applicant($request->applicant_saved_id);
            return ['result'=>'saved','saves'=>User::find($request->applicant_saved_id)->scouters->count()];
        }

    }


    public function user_index_show($id)
    {

        $users = User::findOrFail($id);

        //getting ids of companies that auth user created.
        $companies_ids = Common::company_ids_that_user_have();

        $companies_scouted_array = array();

        $scout_companies = $users->companies_that_scout_users()->withPivot('user_id', 'company_id')->get();

        $companies_array = array();

        for ($j=0; $j < count($scout_companies) ; $j++) {
            if (in_array($scout_companies[$j]->id, $companies_ids)) {
                $companies_array[] = $scout_companies[$j];
            }
        }

        return view('hiring_portal.user_index_show', compact('users', 'companies_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $company_id = $request->input('company_id');

        $companies_show = Company::findOrFail($company_id);

        $companies = Company::latest('created_at')->where('is_active', 1)->where('user_id', Auth::user()->id)->get();

        $openings = Opening::latest('created_at')->where('is_active', 1)->where('company_id', $companies_show->id)->get();

        $opening_ids = array();
        for ($i=0; $i < count($openings) ; $i++) {
            $opening_ids[] = $openings[$i]->id;
        }

        $applications = Application::latest('created_at')->where('is_active', 1)->wherein('opening_id', $opening_ids)->get();

        $applicant_ids = array();
        for ($i=0; $i < count($applications) ; $i++) {
            $applicant_ids[] = $applications[$i]->user_id;
        }

        // $applicant_ids = $applications->list('user_id');

        $applicants = User::wherein('id', $applicant_ids)->get();

        return view('hiring_portal.index', compact('companies_show', 'companies', 'openings', 'applications', 'applicants'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illumin ate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
