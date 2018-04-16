@extends('layouts.app')

@section('content')

    <div id="single-opening" class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#application_form" role="tab" data-toggle="tab">
                    Application From
                </a>
            </li>
            <li role="presentation">
                <a href="#jobinfo" role="tab" data-toggle="tab">
                    Job Information
                </a>
            </li>
            <li role="presentation">
                <a href="#companyinfo" role="tab" data-toggle="tab">
                    Company Information
                </a>
            </li>
        </ul>
        <div class="tab-content">

{{--
 ####  #####  #####    ###### ####  #####  ##   ##
##  ## ##  ## ##  ##   ##    ##  ## ##  ## ### ###
##  ## ##  ## ##  ##   ##    ##  ## ##  ## #######
###### #####  #####    ##### ##  ## #####  ## # ##
##  ## ##     ##       ##    ##  ## ## ##  ## # ##
##  ## ##     ##       ##    ##  ## ##  ## ##   ##
##  ## ##     ##       ##     ####  ##  ## ##   ##
--}}

            <div role="tabpanel" class="tab-pane active" id="application_form" style="padding-top:30px;">
                <div class="resume-info">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 id="resume-info-title">Application information </h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="resume-info-sub-title">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        About me
                                    </h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First name</label>
                                        <div class="col-sm-10">
                                            {{ $resume->f_name }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Middle name</label>
                                        <div class="col-sm-10">
                                            {{ $resume->m_name }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last name</label>
                                        <div class="col-sm-10">
                                            {{ $resume->l_name }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            {{ $resume->gender }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Birth date</label>
                                        <div class="col-sm-10">
                                            {{ $resume->birth_date }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            {{ $resume->address1 }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="resume-info-sub-title">
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                        Education
                                    </h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">University</label>
                                        <div class="col-sm-10">
                                            {{ $resume->university }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Field of study</label>
                                        <div class="col-sm-10">
                                            {{ $resume->field_of_study }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Program of study</label>
                                        <div class="col-sm-10">
                                            {{ $resume->program_of_study }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="resume-info-sub-title">
                                        <i class="fa fa-trophy" aria-hidden="true"></i>
                                        Experience
                                    </h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Work experience</label>
                                        <div class="col-sm-10">
                                            {{ $resume->experience }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Other work experience</label>
                                        <div class="col-sm-10">
                                            {{ $resume->objective }}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="resume-info-sub-title">
                                        <i class="fa fa-code" aria-hidden="true"></i>
                                        Programming language
                                    </h4>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">PHP</label>
                                        <div class="col-sm-10">
                                            {{ $skill_languages['php'] }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ruby</label>
                                        <div class="col-sm-10">
                                            {{ $skill_languages['ruby'] }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Java</label>
                                        <div class="col-sm-10">
                                            {{ $skill_languages['java'] }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">python</label>
                                        <div class="col-sm-10">
                                            {{ $skill_languages['python'] }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                    {!! link_to(action('ApplicationController@applied_index'), 'Back', ['class' => 'btn btn-primary']) !!}
                    <br>
            </div>


    {{--
##  ## ###### #####  ###### ##  ##  ####    ###### ##  ## ###### ####
##  ##   ##   ##  ##   ##   ##  ## ##  ##     ##   ##  ## ##    ##  ##
##  ##   ##   ##  ##   ##   ### ## ##         ##   ### ## ##    ##  ##
######   ##   #####    ##   ###### ## ###     ##   ###### ##### ##  ##
##  ##   ##   ## ##    ##   ## ### ##  ##     ##   ## ### ##    ##  ##
##  ##   ##   ##  ##   ##   ##  ## ##  ##     ##   ##  ## ##    ##  ##
##  ## ###### ##  ## ###### ##  ##  ####    ###### ##  ## ##     ####
--}}

            <div role="tabpanel" class="tab-pane" id="jobinfo" style="padding-top:30px;">
            {{-- START JOB INFO --}}
                <h3>Opening Information</h3>
                <div class="container" id="show_opening"> {{-- START OF SHOW OPENING --}}
                    <div class="row text-center">
                        <div class="col-md-12">
                            <img src="{{ asset('img/opening_banner.png') }}" />
                        </div>
                    </div>
                    <div class="row" id="openings-title">
                        <div class="col-md-2">
                            <img src="/storage/{{ $company->company_logo }}" alt="{{ $company-> company_name}}" />
                        </div>
                        <div class="col-md-6">
                            <h1>{{ $opening->title }}</h1>
                            <h4>
                                <a href="{{ url('companies', $company['id']) }}">
                                    {{ $company->company_name }}
                                    <br>
                                </a>
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <h5>
                                <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                                &nbsp; {{ $opening->address }}
                            </h5>
                            <h5>
                                <i class="fa fa-calendar fa-lg" aria-hidden="true"></i>
                                &nbsp; {{ $opening->created_at }}
                            </h5>
                        </div>
                    </div>
                    <div class="row" id="openings-body">
                        <div class="col-md-7">
                            <div class="job-description">
                                <h4>
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    Job description:
                                </h4>
                                <hr class="hr-desc" />
                                {{ $opening->details }}
                                {{ $opening->details }}
                                {{ $opening->details }}
                                {{ $opening->details }}
                                {{ $opening->details }}
                            </div>
                            <div class="job-qualify">
                                <h4>
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    Job Qualifications:
                                </h4>
                                <hr />
                                <h5>{{ $opening->requirements }}</h5>
                                <h5>{{ $opening->requirements }}</h5>
                                <h5>{{ $opening->requirements }}</h5>
                            </div>

                        </div>

                        <div class="col-md-5">
                            <h4>
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                Company Profile:
                            </h4>
                            <hr>

                            <div class="row">
                                <div class="col-xs-6">
                                    Company size:
                                    <h5>
                                        <b>
                                            {{ $company->number_of_employee }}
                                        </b>
                                        Employees
                                    </h5>
                                    Telephone no.
                                    <h5>
                                        <b>
                                            {{ $company->tel }}
                                        </b>
                                    </h5>
                                    Country
                                    <h5>
                                        <b>
                                            {{ $company->country }}
                                        </b>
                                    </h5>
                                </div>
                                <div class="col-xs-6">
                                    Postal no.
                                    <h5>
                                        <b>
                                            {{ $company->postal }}
                                        </b>
                                    </h5>
                                    CEO:
                                    <h5>
                                        <b>
                                            {{ $company->ceo_name }}
                                        </b>
                                    </h5>
                                    Bill company name:
                                    <h5>
                                        <b>
                                            {{ $company->bill_company_name }}
                                        </b>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {!! link_to(action('ApplicationController@create', [$opening->id]), 'Application Form', ['class' => 'btn btn-danger']) !!}
                </div>
            </div>

{{--
 ####   ####  ##   ## #####   ####  ##  ## ##  ##
##  ## ##  ## ### ### ##  ## ##  ## ##  ## ##  ##
##     ##  ## ####### ##  ## ##  ## ### ## ##  ##
##     ##  ## ## # ## #####  ###### ######  ####
##     ##  ## ## # ## ##     ##  ## ## ###   ##
##  ## ##  ## ##   ## ##     ##  ## ##  ##   ##
 ####   ####  ##   ## ##     ##  ## ##  ##   ##
--}}

            <div role="tabpanel" class="tab-pane" id="companyinfo">
                <h3>Company Information</h3>
                <div class="row">
                    <div class="col-md-4">
                        <img src="/storage/{{ $company->company_logo }}" alt="{{ $company-> company_name}}" />
                    </div>
                    <div class="col-md-6">
                        <h1>{{ $company->company_name }}</h1>
                        <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                        <span style="font-size:16px;margin-left:1rem;">
                            <b>{{ $company['number_of_employee'] }} Employees
                                <br />
                                <br />
                                {{ $company->address1 }}
                                <br />
                                {{ $company->email }}
                            </b>
                        </span>
                    </div>
                    <div class="col-md-2">
                        <h3>{{ $company->city }}</h3>
                    </div>
                </div>
                <hr>
                <h3>About us:</h3>
                {{ $company->what }}
                <h3>Company details:</h3>
                <div class = "body">email : {{ $company->email }}</div>
                <div class = "body">in_charge : {{ $company->in_charge }}</div>
                <div class = "body">ceo_name : {{ $company->ceo_name }}</div>
                <div class = "body">address1 : {{ $company->address1 }}</div>
                <div class = "body">address2 : {{ $company->address2 }}</div>
                <div class = "body">city : {{ $company->city }}</div>
                <div class = "body">country : {{ $company->country }}</div>
                <div class = "body">url : {{ $company->url }}</div>
                <div class = "body">tel : {{ $company->tel }}</div>
                <div class = "body">number_of_employee : {{ $company->number_of_employee }}</div>
            </div>
        </div>
    </div>

@endsection
