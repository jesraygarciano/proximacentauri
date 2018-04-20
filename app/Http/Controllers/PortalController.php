<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Company;
use App\Opening;
use Auth;
use yajra\Datatables\Datatables;
use App\User;
use Mapper;


class PortalController extends Controller
{

    public function __construct()
    {
        $this->middleware('navbar');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function diverge()
    {

        if (Auth::guest()){
            return redirect('portals/general_portal');
        } elseif (Auth::user()->role == 0) {    //regular user side
            return redirect('portals/general_portal');
        } elseif (Auth::user()->role == 1) {    //hiring side
            $company = Company::where('user_id',Auth::user()->id)->where('is_active', 1)->get();
            if(count($company)>0){
                return redirect('hiring_portal');
            }else{
                return redirect('companies/create');
            }
        } elseif (Auth::user()->role == 2) {    //management side
            return redirect('management/users');
        }

    }

    public function hiring_portal(){

        return view('portals.hiring-portal');
    }

    public function general_portal()
    {

        $companies = Company::latest('created_at')->where('is_active', 1)->take(6)->get();

        $featured_openings = Opening::latest('created_at')->where('is_active',1)->take(5)->get();

        $openings = Opening::latest('created_at')->where('is_active', 1)->take(4)->get();

        // fetch province names and province hiring count
        // ->leftJoin('openings','provinces.iso_code','=','openings.province_code')
        $provinces = \DB::table('provinces')->select('name','division','iso_code')->get();

        foreach($provinces as $key => $province){
            $provinces[$key]->hirings = Opening::where('province_code',$province->iso_code)->where('is_active',1)
            ->where('until_post','>',date('Y-m-d H:i:s'))
            ->count();
        }

        // fetch country names and country hiring count
        // ->leftJoin('openings','countries.iso_alpha3','=','openings.country_code')
        $countries = \DB::table('countries')->select('name','iso_alpha3')->get();

        foreach($countries as $key => $country){
            $countries[$key]->hirings = Opening::where('country_code',$country->iso_alpha3)->where('is_active',1)
            ->where('until_post','>',date('Y-m-d H:i:s'))
            ->count();
        }

        return view('portals/general_portal', compact('raw_countries', 'companies', 'featured_openings', 'openings','provinces','countries'));
    }


    public function portal_ph_region_search($code){

        $openings = Opening::where('province_code',$code)->get();
        $province = \DB::table('provinces')->where('iso_code',$code)->first();
        $provinces = \DB::table('provinces')->get();

        return view('openings.map-search-ph', compact('openings','province','provinces'));
    }

    public function portal_ph_division_search($code){

        $provinces = \DB::table('provinces')->where('division',$code)->pluck('iso_code');

        $openings = Opening::whereIn('province_code',$provinces)->get();

        return view('openings.map-search-ph-division', compact('openings','code'));
    }

    public function portal_international_search($code){

        $openings = Opening::where('country_code',$code)->get();
        $provinces = \DB::table('provinces')->get();
        $country = \DB::table('countries')->where('iso_alpha3',$code)->first();

        return view('openings.map-search-international', compact('openings','country','provinces'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
