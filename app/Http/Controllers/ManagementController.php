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

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function user()
    {
        //
        return view('management.users');
    }

    public function company()
    {
        //
        return view('management.companies');
    }    

    public function opening()
    {
        //
        return view('management.openings');
    }

    public function userData()
    {

        $users = User::select(['id', 'f_name','m_name','l_name', 'email', 'role', 'city', 'phone_number', 'country', 'is_active', 'created_at'])->get();
 
        return Datatables::of($users)
            ->make(true);

    }

    public function companyData()
    {

        $companies = Company::select(['id', 'company_name','is_active','ceo_name', 'address1', 'email', 'number_of_employee', 'established_at', 'country'])->get();

        return Datatables::of($companies)
            ->make(true);

    }

    public function openingData()
    {

        $openings = Opening::select(['id', 'title','details','requirements', 'address1', 'created_at', 'is_active'])->get();

        return Datatables::of($openings)
            ->make(true);

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
