<?php

namespace App\Http\Controllers;
use App\Libs\Common;
use App\Company;
use App\Application;
use App\Opening;
use App\User;
use App\Resume;
use App\Resume_skill;
use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('navbar');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('openings.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($opening_id)
    {

        $provinces = \DB::table('provinces')->get();
        $countries = \DB::table('countries')->get();

        $user = \Auth::user();
        $resume = Common::get_master_resume();
        $opening = Opening::findOrFail($opening_id);
        // $company = $opening->company()->get()->first();
        $company = $opening->company()->first();
        // dd($company);
        $skills = Resume_skill::all();
        $educations = $resume->educations()->get();

        if($resume){
            // $resume = Resume::where('user_id', $user->id)->where('is_active', 1)->where('is_master', 1)->get()->first();
            $languages_ids = $resume->has_skill()->get()->pluck('id')->toArray();
        }else{
            $resume = new Resume;
            $languages_ids = array();
        }

        return view('applications.create', compact('user', 'resume', 'languages_ids', 'opening', 'company', 'skills', 'educations','provinces','countries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        // dd($request);
        // $resume = Resume::where('user_id', Auth::user()->id)->where('is_master', 1)->where('is_active', 1)->get()->first();

        // dd($resume);

        $resume = new Resume;
        // dd($resume);
        // $input = $request->except('skills', '_token');
        $resume->user_id = \Auth::id();
        // $resume->fill($request->all())->save();
        // if ($request->has('skills')) {
        //     $resume_skill_ids = $request->input('skills');
        //     foreach($resume_skill_ids as $resume_skill_id) {
        //         $resume->has_skill()->attach($resume_skill_id);
        //     }
        // }

        $applications = new Application;
        $applications->description = $request->input('description');
        $applications->user_id = \Auth::id();
        $applications->opening_id = $request->input('opening_id');
        $applications->expected_salary = $request->expected_salary ?? '';
        $applications->from_available_time = $request->from_available_time;
        $applications->to_available_time = $request->to_available_time;
        $applications->resume_id = $resume->id;
        $applications->save();

        // dd($resume);

        return redirect()->route('applications.applied_index')->with('success', 'Application Submmited');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //syntax below is not used anymore but remain for reference
    public function show($id)
    {


        $application = Application::findOrFail($id);
        $resume = Resume::findOrFail($application->resume_id);
        $user = \Auth::user();
        $skill_languages = Common::resume_skill_get($resume);
        $opening = Opening::findOrFail($application->opening_id);
        $company = Company::where('id', $opening->company_id)->get()->first();

        return view('applications.show', compact('application', 'resume', 'user', 'skill_languages', 'opening', 'company'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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

    public function applied_index()
    {
        //getting application data and opening data that is linked with the application datas
        // $applied_application_openings = Application::applied_application_openings(\Auth::id());
        $applied_application_openings = \Auth::user()->openings()->orderBy('pivot_created_at', 'desc')->get();
        // dd($applied_application_openings);


        return view('applications/applied_index', compact('applied_application_openings'));
    }

}
