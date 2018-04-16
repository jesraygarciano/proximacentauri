@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
    <div class="col-sm-3">
            <img src="{{asset('img/bg-img.png')}}" class="bg-img">
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <h2>Jeremy Rose</h2>
                <h4>Product Designer</h4>

            </div>
            <div class="col-sm-6">
                <i fa fa-user></i> {{ $resume->address1 }} 
            </div>

        </div>
    </div>

</div>


<!--         <div class="applicant-desc">
            <div class="row" id="applicant-desc-info">
                <div class="col-md-12">
                    <div class="well-lg">
                        <h4>Application letter</h4>
                        <p>{{ $application->description }} </p>
                    </div>
                </div>
            </div>

            <div class="row" id="applicant-resume-info">
                <div class="col-md-12">
                    <div class="well-lg">
                       <h4>Applicants resume information</h4>

                       <div class="row">
                            <div class="col-md-3">
                                <h4>University</h4>
                                <div class="well-lg">
                                    {{ $resume->university }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4>Program of study</h4>
                                <div class="well-lg">
                                    {{ $resume->program_of_study }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4>Field of study:</h4>
                                <div class="well-lg">
                                    {{ $resume->field_of_study }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4>Home address:</h4>
                                <div class="well-lg">
                                    {{ $resume->address1 }}
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="col-md-3">
                                <h4>Objective:</h4>
                                <div class="well-lg">
                                    {{ $resume->objective }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4>Nationality:</h4>
                                <div class="well-lg">
                                    {{ $resume->nationality }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4>Birth date:</h4>
                                <div class="well-lg">
                                    {{ $resume->birth_date }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h4>Email:</h4>
                                <div class="well-lg">
                                    {{ $resume->email }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div> -->
</div>
@endsection
