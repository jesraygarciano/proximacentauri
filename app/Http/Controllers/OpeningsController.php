<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Opening;
use App\Company;
use App\Resume;
use App\Opening_skill;
use App\Joining_opening_skill;
use App\Libs\Common;
use Auth;
use App\User;
use Mapper;
use Carbon\Carbon;

// use Common;

class OpeningsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'searched_index_general','search_opening_with_language', 'searched_index_advance', 'show']]);
        $this->middleware('onlyhiring', ['except' => ['index', 'edit_opening_bookmark', 'search_opening_with_language', 'searched_index_general', 'searched_index_advance', 'show', 'bookmark_openings_index','bookmark_lists', 'unbookmark_openings_index']]);
        $this->middleware('navbar');
    }

    public function searched_index_general(Request $request)
    {
        return view('openings.index', compact('openings'));
    }

    // uelmar's
    public function edit_opening_bookmark(Request $request){

        if(Auth::user()->is_bookmarking($request->opening_id)){
            Auth::user()->unbookmark($request->opening_id);
            return ['result'=>'unbookmarked','bookmarks'=>Opening::find($request->opening_id)->bookmark_count()];
        }
        else{
            Auth::user()->bookmark($request->opening_id);
            return ['result'=>'bookmarked','bookmarks'=>Opening::find($request->opening_id)->bookmark_count()];
        }
    }

    public function index(Request $request)
    {
        $openings = Opening::where('is_active', 1)->orderBy('created_at','desc');
        $provinces = \DB::table('provinces')->get();
        $countries = \DB::table('countries')->get();

        if($request->languages && strlen($request->languages[0]) > 0)
        {
            $resume_skills = Opening_skill::whereIn('language',$request->languages)->pluck('id');
            $pivot_opening_skills = Joining_opening_skill::whereIn('opening_skill_id',$resume_skills)->pluck('opening_id');
            $openings->whereIn('id',$pivot_opening_skills);
        }

        if($request->opening_search){
            $company_search_ids = Company::where('company_name','like','%'.$request->opening_search.'%')->pluck('id');
            $openings->where('title','like','%'.$request->opening_search.'%')->orWhereIn('company_id',$company_search_ids);
        }

        if($request->company_name){
            $company_search_ids = Company::where('company_name','like','%'.$request->company_name.'%')->pluck('id');
            $openings->whereIn('company_id',$company_search_ids);
        }

        if($request->province){
            $provinces_search = \DB::table('provinces')->whereRaw('name like "%'.$request->province.'%" or iso_code like "%'.$request->province.'%"')->pluck('iso_code');
            $openings->whereIn('province_code',$provinces_search);
        }

        if($request->hiring_type){
            $openings->where('hiring_type',$request->hiring_type);
        }

        if($request->salary_range){
            $openings->where('salary_range',$request->salary_range);
        }

        $openings = $openings->where('is_active', 1)
        ->whereDate('from_post', '<', date('Y-m-d\TH:i'))
        ->whereDate('until_post', '>', date('Y-m-d\TH:i'))
        ->paginate(6);


        return view('openings.index',compact('provinces','openings'));
    }

    public function bookmark_openings_index($opening_id)
    {

        Auth::user()->bookmark($opening_id);
        return redirect()->back();

    }

    public function unbookmark_openings_index($opening_id)
    {

        Auth::user()->unbookmark($opening_id);

        return redirect()->back();

    }

    public function bookmark_lists(){
        $provinces = \DB::table('provinces')->get();
        $countries = \DB::table('countries')->get();

        $bookmarks = Auth::user()->bookmarkings;
        return view('openings.bookmarked_list', compact('bookmarks','countries','provinces'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $company_id = $request->company_id;
        $opening = $request->opening_id ? Opening::find($request->opening_id) : false;
        $provinces = \DB::table('provinces')->get();
        $countries = \DB::table('countries')->get();

        $country_array = Common::return_country_array();
        return view('openings.create', compact('countries','company_id','opening','post_active','provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!$request->has('skills')) {
            $request->skills = "";
        }

        $this->validate($request, [
                'title' => 'required',
                'hiring_type' => 'required',
                'skills' => 'required',
                'salary_range' => 'required',
                'details' => 'required',
                'requirements' => 'required',
            ],
            [
                'title.required' => 'Please input the Job title',
                'skills.required' => 'Please choose atleast one skill requirement',
                'hiring_type.required' => 'Please choose the type of job',
                'salary_range.required' => 'Please select salary range',
                'details.required' => 'Please provide details on new Opening Job',
                'requirements.required' => 'Please provide requirements for this Opening job',
            ]
        );

        // Create Opening
        $opening = $request->opening_id ? Opening::find($request->opening_id) : new Opening;

        if($request->picture){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->picture));
            $fileNameToStore = time().'.png';
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
            $opening->picture = $fileNameToStore;
        }

        $opening->title = $request->title;
        $opening->salary_range = $request->salary_range;

        if(!$request->opening_id)
        {
            $opening->company_id = $request->company_id;
        }

        $opening->hiring_type = $request->hiring_type;
        $opening->address1 = $request->address1;

        if (!empty($request->address2)) {
            $opening->address2 = $request->address2;
        }

        if (!empty($request->province)) {
            $opening->province_code = $request->province;
            $opening->country_code = 'PHL';
        }

        if (!empty($request->postal)){
            $opening->postal = $request->postal;
        }

        if (!empty($request->country)) {
            $opening->country_code = $request->country;
        }

        if (!empty($request->city)) {
        $opening->city = $request->city;
        }

        $opening->details = $request->details;
        $opening->requirements = $request->requirements;

        $opening->from_post = $request->from_post;
        $opening->until_post = Carbon::parse($request->from_post)->AddDays(30);
        $opening->save();
        $opening->register_skill($request->skills);

        return redirect('hiring_portal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $provinces = \DB::table('provinces')->get();
        $countries = \DB::table('countries')->get();
        $opening = Opening::findOrFail($id);

        $company = Company::where('id', $opening->company_id)->get()->first();

        //getting ids of companies that auth user created.
        $companies_ids = Common::company_ids_that_user_have();

        $more_openings = Opening::where('id', '!=', $opening->id)->where('company_id', $company->id)->get();

        $resume = array();
        if(Auth::check()){
            $resume = Resume::where('user_id', Auth::user()->id)->where('is_master', 1)->where('is_active', 1)->get()->first();
        }

        return view('openings.show', compact('opening','company', 'resume', 'more_openings','provinces','countries','companies_ids'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $company_id = $request->company_id;
        $opening = $request->opening_id ? Opening::find($request->opening_id) : false;
        $provinces = \DB::table('provinces')->get();
        $countries = \DB::table('countries')->get();

        $country_array = Common::return_country_array();
        return view('openings.edit', compact('country_array','company_id','opening','post_active','provinces','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if (!$request->has('skills')) {
            $request->skills = "";
        }

        $this->validate($request, [
            'title' => 'required',
            'hiring_type' => 'required',
            'skills' => 'required',
            'salary_range' => 'required',
            'details' => 'required',
            'requirements' => 'required',
        ],
        [
            'title.required' => 'Please input the Job title',
            'skills.required' => 'Please choose atleast one skill requirement',
            'hiring_type.required' => 'Please choose the type of job',
            'salary_range.required' => 'Please select salary range',
            'details.required' => 'Please provide details on new Opening Job',
            'requirements.required' => 'Please provide requirements for this Opening job',
        ]);

        // Create Opening
        $opening = $request->opening_id ? Opening::find($request->opening_id) : new Opening;

        if($request->picture){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->picture));
            $fileNameToStore = time().'.png';
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
            $opening->picture = $fileNameToStore;
        }

        $opening->title = $request->title;
        $opening->salary_range = $request->salary_range;

        if(!$request->opening_id)
        {
            $opening->company_id = $request->company_id;
        }

        $opening->address1 = $request->address1;
        $opening->address2 = $request->address2;
        $opening->province_code = $request->province;
        $opening->postal = $request->postal;
        $opening->country_code = $request->country;
        $opening->city = $request->city;

        $opening->details = $request->details;
        $opening->requirements = $request->requirements;

        $opening->from_post = $request->from_post;
        $opening->until_post = Carbon::parse($request->from_post)->AddDays(30);

        $opening->save();
        $opening->register_skill($request->skills);

        return redirect('hiring_portal');

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
