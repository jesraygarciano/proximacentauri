<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\Common;
use App\Company;
use App\Opening;
use Auth;
use Mapper;

class CompaniesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('onlyhiring', ['except' => ['edit_company_follow', 'index', 'show','follow_companies_index','unfollow_companies_index','follow_company_lists']]);
        $this->middleware('navbar');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $searchData = $request->company_name;
        $w_hiring_info = $request->w_hiring_info;
        $openings = Opening::query()->where('is_active', 1)->orderBy('created_at','desc');

        if(!empty($searchData)){
            if(!empty($w_hiring_info)){

                $companies = Company::where('company_name', 'LIKE', '%'. $searchData . '%')->paginate(10);

            }
            else{
                $companies = Company::where('company_name', 'LIKE', '%'. $searchData . '%')->paginate(10);
            }
        }elseif(!empty($w_hiring_info)){

                $companies = Company::where('company_name', 'LIKE', '%'. $searchData . '%')->paginate(10);
        }
        else{
            $companies = Company::latest('created_at')->where('is_active', "1")->paginate(10);
        }

        return view('companies.index', compact('companies','companies_filter'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        if($request->company_logo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->company_logo));
            $fileNameToStore = time().'.png';
            file_put_contents(public_path('/storage/').$fileNameToStore, $data);
        }

        $this->validate($request, [
            'company_name' => 'required',
            'email' => 'required|email|unique:companies',
            'company_logo' => 'required',
            'tel' => 'required',
            'established_at' => 'required',            
        ],
        [
            'company_name.required' => 'Provide company name',
            'email.email' => 'Please provide valid email address',            
            'email.required' => 'Please input email address',
            'email.unique' => 'Email address is already taken',            
            'company_logo.required' => 'Company logo is required',
            'tel.required' => 'Company contact# is required',
            'established_at.required' => 'Provide company established date',

        ]);


        $request->user()->companies()->create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'is_active' => '1',
            'company_logo' => $fileNameToStore,
            'tel' => $request->tel,
            'established_at' => $request->established_at,

        ]);

        \Session::flash('flash_message', 'created company information');

        return redirect('/hiring_portal');
    }


// FOLLOW COMPANIES METHOD
    public function follow_companies_index($company_id)
    {

        Auth::user()->follow($company_id);
        return redirect()->back();

    }

    // uelmar's
    public function edit_company_follow(Request $request){

        if(Auth::user()->is_following($request->company_id)){
            Auth::user()->unfollow($request->company_id);
            return 'unfollowed';
        }
        else
        {
            Auth::user()->follow($request->company_id);
            return 'followed';
        }

    }

    public function unfollow_companies_index($company_id)
    {

        Auth::user()->unfollow($company_id);

        return redirect()->back();

    }

    public function follow_company_lists(){

        $follows = Auth::user()->followings;
        return view('companies.followed_list')->with('follows', $follows);

    }

    // FOLLOW COMPANIES METHOD
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
        $company = Company::findOrFail($id);

        $openings = Opening::where('company_id', $company->id)->get();

        //getting ids of companies that auth user created.
        $companies_ids = Common::company_ids_that_user_have();

        /*Mapper::map(53.381128999999990000, -1.470085000000040000, ['zoom' => 10, 'markers' => ['title' => 'My Location', 'animation' => 'DROP']]);*/

        if (!empty($company->address1)){
        // Mapper::location($company->city, $company->country); //company_location
        //$company->address1. " ". $company->city. " ".
        Mapper::location($company->country)->map(['zoom' => 17, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 30]]);

    }
        return view('companies.show', compact('provinces','countries','company', 'openings', 'companies_ids'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('companies.edit', compact('company'));
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
        $this->validate($request, [
            'email' => 'required',
            'url' => 'required',
            'company_size' => 'required',
            'tel' => 'required',

        ],
        [
            'email.required' => 'Please input email address',
            'url.required' => 'Company URL is required',
            'company_size.required' => 'Please provide company size',
            'tel.req' => 'Company contact# is required',
        ]);

        if($request->company_logo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->company_logo));
            $fileNameToStore = time().'.png';
            file_put_contents(public_path('storage/').$fileNameToStore, $data);
        }
        if($request->background_photo){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->background_photo));
            $fileNameToStoreCover = time().'cover'.'.png';
            file_put_contents(public_path('storage/').$fileNameToStoreCover, $data);
        }
        if($request->what_photo1){
            $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->what_photo1));
            $fileNameToStoreWhat = time().'what'.'.png';
            file_put_contents(public_path('storage/').$fileNameToStoreWhat, $data);
        }

        $company = $request->user()->companies()->first();

        $company->update([
            'email' => $request->email,
            'is_active' => '1',
            'company_logo' => isset($fileNameToStore) ? $fileNameToStore : $company->getOriginal('company_logo'),
            'background_photo' => isset($fileNameToStoreCover) ? $fileNameToStoreCover : $company->getOriginal('background_photo'),
            'what_photo1' => isset($fileNameToStoreWhat) ? $fileNameToStoreWhat : $company->getOriginal('what_photo1'),
            'tel' => $request->tel,
            'address1' => $request->address1,
            'established_at' => $request->established_at,
            'what' => $request->what,
            'what_photo1_explanation' => $request->what_photo1_explanation,
            'ceo_name' => $request->ceo_name,
            'url' => $request->url,
            'company_size' => $request->company_size,
            'city' => $request->city,
            'country' => $request->country,
            'spoken_language' => $request->spoken_language,
        ]);

        \Session::flash('flash_message', 'Updated company information');

        return redirect('/hiring_portal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        \Session::flash('flash_message', 'deleted company information');

        return redirect('companies');
    }
}
