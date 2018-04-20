<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libs\Common;
use App\Company;
use App\Scout;
use App\User;
use Auth;

class ScoutsController extends Controller
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create($scout_user_id)
     {
        // dd($scout_user_id);
        $companies = Common::companies_that_user_have();
        return view('scouts.create', compact('scout_user_id', 'companies'));
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
        $this->validate($request, [
            'description' => 'required'
            ]);

        $scout = new Scout;
        $scout->company_id = $request->input('company_id');
        $scout->user_id = $request->input('user_id');
        $scout->description = $request->input('description');
        $scout->save();

        return redirect()->route('hiring_portal.user_index_show', $scout->user_id)->with('success', 'submit scout');;
    }

    public function company_scout(){

        $companies = Auth::user()->companies_that_scout_users()->get();

        return view('scouts.company_scout')->with('companies', $companies);
    }

    public function company_scout_note($id){

        $companies = Company::findOrFail($id);
        // $scouts = Scouts::findOrFail($id);
        $scouts = Scout::latest('created_at')->where('user_id', Auth::user()->id)->where('is_active', 1)->first();

        return view('scouts.company_scout_note', compact('companies','scouts'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
