@extends('layouts.app')

@section('content')

    <style type="text/css">

    .cover-info .picture img{
        width: 100%;
    }
    
    .cover-info{
    }
    
    .cover-info img{
        border:none!important;
    }
    
    .info{
        font-size: 15px;
        padding-bottom: 20px;
        overflow-wrap: break-word;
    }
    
    .ui.form{
        font-size: 12px;
    }
    
    .page-header .fa{
        color: #0f739b;
    }
    </style>
    
<div class="container tall single-page">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#application_form" role="tab" data-toggle="tab">
                Application Form
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

        <div role="tabpanel" class="tab-pane active" id="application_form">
            @include('inc.message')
            <div class="row">
                <div class="wizard" id="resume-wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav progress-nav-tabs" role="tablist">
                            <li role="presentation" class="active application">
                                <a href="#step0" data-toggle="tab" aria-controls="step0" role="tab" title="Step 0">
                                    <span class="round-tab">
                                        <i class="fa fa-file"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled application">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                    <span class="round-tab">
                                        <i class="fa fa-id-card"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled application">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                    <span class="round-tab">
                                        <i class="fa fa-code"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled application">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                    <span class="round-tab">
                                        <i class="fa fa-file-text-o"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled application">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                    <span class="round-tab">
                                        <i class="fa fa-check"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {!!Form::open(['action' => 'ApplicationController@store', 'method' => 'POST', 'files' => true]) !!}
                    <div class="tab-content">
                        {{--
                         #### ###### ###### #####           ####
                        ##  ##  ##   ##     ##  ##         ##  ##
                        ##      ##   ##     ##  ##         ## ###
                         ####   ##   #####  #####   ###### ######
                            ##  ##   ##     ##             ### ##
                        ##  ##  ##   ##     ##             ##  ##
                          ###   ##   ###### ##              ####
                        --}}
                        <div class="tab-pane active wizard-step" role="tabpanel" id="step0">
                            <h3>step0</h3>

                            <h4 class="form-heading">Why do you want to join us?</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!!Form::label('objective', 'Objective:',['class' => 'required-label'])!!}
                                            {!!Form::textarea('description', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Expected Salary</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::text('expected_salary', old('expected_salary'), ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Available Time</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="from_available_time" class="required-label">From</label>
                                            {!!Form::select('from_available_time', available_time_convert(), old('from_available_time') ?? 8, ['class' => 'form-control']);!!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="to_available_time" class="required-label">To</label>
                                            {!!Form::select('to_available_time', available_time_convert(), old('from_available_time') ?? 17, ['class' => 'form-control']);!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-info-full next-step">Submit</button>
                        </div>
                        {{--
                         #### ###### ###### #####          ##
                        ##  ##  ##   ##     ##  ##        ###
                        ##      ##   ##     ##  ##         ##
                         ####   ##   #####  #####   ###### ##
                            ##  ##   ##     ##             ##
                        ##  ##  ##   ##     ##             ##
                          ###   ##   ###### ##           ######
                        --}}
                        <div class="tab-pane wizard-step" role="tabpanel" id="step1">
                            {!! csrf_field() !!}
                            {!! Form::hidden('user_id', Auth::id()) !!}

                            <h4 class="form-heading">Name</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {!!Form::label('f_name', 'First Name', ['class' => 'required-label'])!!}
                                            {!!Form::text('f_name', $resume->f_name, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('m_name', 'Middle Name')!!}
                                            {!!Form::text('m_name', $resume->m_name, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {!!Form::label('l_name', 'Last Name', ['class' => 'required-label'])!!}
                                            {!!Form::text('l_name', $resume->l_name, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading required-label">Phone Number</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {{-- {!!Form::label('phone_number', 'Phone number:')!!} --}}
                                            {!!Form::text('phone_number', $resume->phone_number, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading required-label">Email Address</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {{-- {!!Form::label('email', 'Email address:')!!} --}}
                                            {!!Form::text('email', $resume->email, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading required-label">Birth Date</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {{-- {!!Form::label('birth_date', 'Birth Date:')!!} --}}
                                            {!!Form::date('birth_date', $resume->birth_date, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Your place</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {!!Form::label('address1', 'Address1', ['class' => 'required-label'])!!}
                                            {!!Form::text('address1', $resume->address1, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {!!Form::label('address2', 'Address2', ['class' => 'required-label'])!!}
                                            {!!Form::text('address2', $resume->address2, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {!!Form::label('city', 'City', ['class' => 'required-label'])!!}
                                            {!!Form::text('city', $resume->city, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {!!Form::label('country', 'Country', ['class' => 'required-label'])!!}
                                            {!!Form::text('country', $resume->country, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group required">
                                            {!!Form::label('postal', 'Postal Code', ['class' => 'required-label'])!!}
                                            {!!Form::text('postal', $resume->postal, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Gender</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- {!!Form::label('gender', 'Gender:')!!}<br> --}}
                                            <input name="gender" type="radio" checked value="male">&nbsp;&nbsp;male&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input name="gender" type="radio" value="female">&nbsp;&nbsp;female&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input name="gender" type="radio" value="no-answer">&nbsp;&nbsp;no answer
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Marital Status</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- {!!Form::label('civil_status', 'Marital Status:')!!}<br> --}}
                                            <input name="marital_status" type="radio" checked value="single">&nbsp;&nbsp;single&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input name="marital_status" type="radio" value="married">&nbsp;&nbsp;married&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input name="marital_status" type="radio" value="no-answer">&nbsp;&nbsp;no answer
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading required-label">Spoken Languages</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-6">
                                        <div class="form-group required">
                                            {{-- {!!Form::label('email', 'Email address:')!!} --}}
                                            {!!Form::text('spoken_language', $resume->spoken_language, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading required-label">Your Photo</h4>
                            <hr>
                            <div class = "row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-6">
                                        {{-- <div class="form-group">
                                            {!!Form::file('photo')!!}
                                            <div class="imagePreview"></div>
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        Choose File<input type="file" name="photo" style="display:none" class="uploadFile">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly="">
                                            </div>
                                        </div> --}}
                                        <div class="crop-control" style="height: 200px; width: 200px;">
                                            <div class="image-container">
                                              <img src="{{ $resume->photo }}">
                                              <label for="photo" class="input-trigger hover-div">
                                                <p>
                                                  <i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i>
                                                  <br>
                                                  Upload
                                                </p>
                                              </label>
                                            </div>
                                            <div class="input-container" id="photo-container">
                                              <input type="file" id="photo" name="photo" accept="image/*" />
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading required-label">Educational Background</h4>

                            @foreach ($educations as $education)

                                <hr>
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-11">
                                        <div class="col-md-4">
                                            <div class="form-group required">
                                                {!!Form::label('ed_university', 'University', ['class' => 'required-label'])!!}
                                                {!!Form::text('ed_university', $education->ed_university, ['class' => 'form-control'])!!}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!!Form::label('ed_field_of_study', 'Field of study')!!}
                                                {!!Form::text('ed_field_of_study', $education->ed_field_of_study, ['class' => 'form-control'])!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!!Form::label('ed_program_of_study', 'Program of study')!!}
                                                {!!Form::text('ed_program_of_study', $education->ed_program_of_study, ['class' => 'form-control'])!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-offset-1 col-md-11">
                                        <div class="col-md-8">
                                            <div class="form-group required">
                                                {!!Form::label('duration', 'Duration', ['class' => 'required-label'])!!}<br>
                                                {!!Form::select('ed_from_month', month_array(), null, ['class' => 'ui dropdown single-select parent-form-group'])!!},
                                                {!!Form::select('ed_from_year', year_array(), null, ['class' => 'ui dropdown single-select parent-form-group'])!!}
                                                &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                                                {!!Form::select('ed_to_month', month_array(), null, ['class' => 'ui dropdown single-select parent-form-group'])!!},
                                                {!!Form::select('ed_to_year', year_array(), null, ['class' => 'ui dropdown single-select parent-form-group'])!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="row">
                                <button type="button" class="btn btn-primary pull-right next-step">Save and continue</button>
                            </div>
                        </div>
{{--
                         #### ###### ###### #####        ####
                        ##  ##  ##   ##     ##  ##      ##  ##
                        ##      ##   ##     ##  ##          ##
                         ####   ##   #####  #####   ###### ##
                            ##  ##   ##     ##            ##
                        ##  ##  ##   ##     ##           ##
                          ###   ##   ###### ##          ######
 --}}
                        <div class="tab-pane wizard-step" role="tabpanel" id="step2">
                            <h4 class="form-heading  required-label">Summary of your skill/experience</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!!Form::textarea('summary', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Skills</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'PHP:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "PHP")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Ruby:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Ruby")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Java:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Java")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'C++:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "C++")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Python:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Python")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Swift:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Swift")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Go:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Go")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'C#:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "C#")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Javascript:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Javascript")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Node.js:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Node.js")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'version control:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "versioncontrol")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'CSS framework:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "CSSframework")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'CSS preprocessors/postprocessors:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "CSSpreprocessors/postprocessors")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Cloud hosting:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Cloudhosting")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Mobile app programming:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Mobileappprogramming")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Database:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "Database")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Other Languages:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "otherlanguages")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('skills[]', 'Other tools:')!!}
                                            <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                                                <option value="">Select</option>
                                                @for($i=0; $i < count($skills) ; $i++)
                                                @if($skills[$i]->language == "othertools")
                                                <option value={{$skills[$i]->id}}>{{$skills[$i]->category}}</option>
                                                @endif
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Other Skills</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!!Form::textarea('other_skills', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Portfolio</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!!Form::textarea('websites', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Experience</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('ex_company', 'Company:')!!}
                                            {!!Form::text('ex_company', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('ex_position', 'Position:')!!}
                                            {!!Form::text('ex_position', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('duration', 'Duration:')!!}<br>
                                            {!!Form::select('ex_from_month', month_array(), null, ['class' => 'ui dropdown single-select'])!!},
                                            {!!Form::select('ex_from_year', year_array(), null, ['class' => 'ui dropdown single-select'])!!}
                                            &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                                            {!!Form::select('ex_to_month', month_array(), null, ['class' => 'ui dropdown single-select'])!!},
                                            {!!Form::select('ex_to_year', year_array(), null, ['class' => 'ui dropdown single-select'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('ex_explanation', 'Responsibilities:')!!}
                                            {!!Form::textarea('ex_explanation', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                            </ul>
                        </div>
{{--
                         #### ###### ###### #####         ####
                        ##  ##  ##   ##     ##  ##       ##  ##
                        ##      ##   ##     ##  ##           ##
                         ####   ##   #####  #####   ###### ###
                            ##  ##   ##     ##               ##
                        ##  ##  ##   ##     ##           ##  ##
                          ###   ##   ###### ##            ####
 --}}
                        <div class="tab-pane wizard-step" role="tabpanel" id="step3">
                            <h4 class="form-heading required-label">Objective</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{-- {!!Form::label('objective', 'Objective:')!!} --}}
                                            {!!Form::textarea('objective', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Seminers Attended</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{-- {!!Form::label('objective', 'Objective:')!!} --}}
                                            {!!Form::textarea('seminars_attended', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Awards/Certificate</h4>
                            <hr>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{-- {!!Form::label('objective', 'Objective:')!!} --}}
                                            {!!Form::textarea('awards', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Character Reference1</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('cr_company', 'Company:', ['class' => 'required-label'])!!}
                                            {!!Form::text('cr_company', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('cr_position', 'Position:')!!}
                                            {!!Form::text('cr_position', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_name', 'Name:', ['class' => 'required-label'])!!}
                                            {!!Form::text('cr_name', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_phone_number', 'Phone number:', ['class' => 'required-label'])!!}
                                            {!!Form::text('cr_phone_number', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_email', 'Email address:')!!}
                                            {!!Form::text('cr_email', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Character Reference2</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('cr_company_2', 'Company:')!!}
                                            {!!Form::text('cr_company_2', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('cr_position_2', 'Position:')!!}
                                            {!!Form::text('cr_position_2', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_name_2', 'Name:')!!}
                                            {!!Form::text('cr_name_2', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_phone_number_2', 'Phone number:')!!}
                                            {!!Form::text('cr_phone_number_2', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_email_2', 'Email address:')!!}
                                            {!!Form::text('cr_email_2', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="form-heading">Character Reference3</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('cr_company_3', 'Company:')!!}
                                            {!!Form::text('cr_company_3', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!!Form::label('cr_position_3', 'Position:')!!}
                                            {!!Form::text('cr_position_3', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_name_3', 'Name:')!!}
                                            {!!Form::text('cr_name_3', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_phone_number_3', 'Phone number:')!!}
                                            {!!Form::text('cr_phone_number_3', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!!Form::label('cr_email_3', 'Email address:')!!}
                                            {!!Form::text('cr_email_3', null, ['class' => 'form-control'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {!! Form::hidden('is_active', 1) !!}
                            {!! Form::hidden('opening_id', $opening->id) !!}
                            {!! Form::hidden('is_master', 1) !!}
                            <p>This is step 3</p>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                <!-- <li><button type="button" class="btn btn-default next-step">Skip</button></li> -->
                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                            </ul>
                        </div>

{{--
                         ####   ####  ##   ## #####  ##     ###### ###### ######
                        ##  ## ##  ## ### ### ##  ## ##     ##       ##   ##
                        ##     ##  ## ####### ##  ## ##     ##       ##   ##
                        ##     ##  ## ## # ## #####  ##     #####    ##   #####
                        ##     ##  ## ## # ## ##     ##     ##       ##   ##
                        ##  ## ##  ## ##   ## ##     ##     ##       ##   ##
                         ####   ####  ##   ## ##     ###### ######   ##   ######
 --}}

                        <div class="tab-pane wizard-step" role="tabpanel" id="complete">
                            <h3>Complete</h3>
                            <p>You have successfully completed all steps.</p>
                            <p>Please click submit button.</p>
                            <br>
                            <button type="submit" class="btn btn-primary btn-info-full">Submit</button>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
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

        <div role="tabpanel" class="tab-pane" id="jobinfo">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Job Information</h2>
                </div>
            </div>
            @if(\Auth::user() ? \Auth::user()->canEdit($opening) : false)
                <a class="ui blue button massive" href="{{url('openings/edit').'/?opening_id='.$opening->id}}"> Edit </a>
            @endif
            <div class="row" style="margin-top: 5px;">
                <div class="col-md-6">
                    <h4 class="page-header"><i class="fa fa-file-text" aria-hidden="true"></i> Basic Job Info</h4>
                    <div class="ui form">
                        <label>Job Title</label>
                        <div class="info">{{$opening->title}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ui form">
                                <label>Salary Range</label>
                                <div class="info">{!! salary_ranges()[$opening->salary_range] !!}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ui form">
                                <label>Hiring Type</label>
                                <div class="info">
                                    @if($opening->hiring_type == 0)
                                        Intern
                                    @elseif($opening->hiring_type == 1)
                                        Regular
                                    @elseif($opening->hiring_type == 2)
                                        Temporary
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ui form">
                        <label>Date posted:</label>
                        <div class="info">
                                 {{ date(' M. j, Y ',strtotime($opening->created_at)) }}
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="ui form">
                                <label>Primary address:</label>
                                <div class="info">
                                    {{$opening->address1}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ui form">
                                <label>Secondary address:</label>
                                <div class="info">
                                    {{$opening->address2}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ui form">
                        <label>City/Province:</label>
                        <div class="info">
                            @foreach($provinces as $province)
                                {{$province->iso_code === $opening->province_code ? $province->name : ''}}
                            @endforeach
                            {{ $opening->city }}
                        </div>
                    </div>

                    <div class="ui form">
                        <label>Postal:</label>
                        <div class="info">
                            {{$opening->postal}}
                        </div>
                    </div>

                    <div class="ui form">
                        <label>Country:</label>
                        <div class="info">
                            @foreach($countries as $country)
                                {{$country->iso_alpha3 === $opening->country_code ? $country->name : ''}}
                            @endforeach
                        </div>
                    </div>

                    <div class="ui form">
                        <label>Details</label>
                        <div class="info">{!! $opening->details != '' ? $opening->details : '<span style="color:gray;">No info.</span>' !!}</div>
                    </div>


                    <div class="ui form">
                        <label>Requirements</label>
                        <div class="info">{!! $opening->requirements != '' ? $opening->requirements :  '<span style="color:gray;">No info.</span>' !!}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="page-header">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        Skill Requirements
                        <span style="color:#a94442;"></span>
                    </h4>
                    <div class="row" id="skill_required">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <script type="text/javascript">
                        $(function(){
                            var skill_requirements = JSON.parse("{{json_encode($opening->skill_requirements)}}".replace(/&quot;/g,'"'));

                            var skills_container = $('#skill_required');
                            var language_added = [];
                            var x = 0;

                            for(var i = 0; i < skill_requirements.length; i++){
                                if(x > 2){
                                    x = 0;
                                }

                                var lang = skill_requirements[i].language.toLowerCase() == 'c++' ? 'cplus2' : (skill_requirements[i].language.toLowerCase() == "c#" ? 'csharp' : (skill_requirements[i].language.toLowerCase() == 'node.js' ? 'node-js' : skill_requirements[i].language.toLowerCase()) );

                                if(language_added.includes(lang)){
                                    skills_container.find('.'+lang).parent().find('.body').append('<div class="ellipsis">'+skill_requirements[i].category+'</div>');
                                }
                                else
                                {
                                    skills_container.find('.col-md-4').eq(x).append(
                                        '<div class="job-card">'
                                        +'    <div class="header ellipsis '+lang+'">'+skill_requirements[i].language+'</div>'
                                        +'    <div class="body"><div class="ellipsis">'+skill_requirements[i].category+'</div> </div>'
                                        +'</div>'
                                    );
                                    language_added.push(lang)
                                    x++;
                                }
                            }

                            if(skill_requirements.length < 1){
                                skill_requirements.html('<div class="col-md-4" style="color:gray;">No skill requirements.</div>');
                            }
                        });
                        </script>
                    </div>
                </div>
                @if (!Auth::guest())
                    @if (Auth::user()->role == 0)
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{action('ApplicationController@create', $opening->id)}}" class="ui button red big" >
                                    Apply to this Job
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>


        <script type="text/javascript">
            $(document).ready(function(){
                unickwizard($('#resume-wizard'),{
                    rules:{

                        // step 1 requirements
                        photo:{
                            identifier:'photo',
                            rules: [
                                {
                                    type:'file',
                                    prompt:'Photo required'
                                }
                            ]
                        },
                        description:{
                            identifier:'description',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Description is required'
                                }
                            ]
                        },
                        from_available_time:{
                            identifier:'from_available_time',
                            rules: [
                                {
                                    type:'lower',
                                    c_input:'to_available_time',
                                    prompt:'This should be lower'
                                }
                            ]
                        },
                        to_available_time:{
                            identifier:'to_available_time',
                            rules: [
                                {
                                    type:'higher',
                                    c_input:'from_available_time',
                                    prompt:'This should be higher'
                                }
                            ]
                        },
                    }
                }
            );
        });
        </script>


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
<div class="row">
    <div class="col-sm-12">
        <h2>Company Information</h2>
    </div>
</div>
<style type="text/css">

</style>
<div class="row">
    <div class="col-md-12 cover-info">
        <div class="row">
            <div class="col-md-12">
                <div class="cover-image">
                    <img src="{{ $company->background_photo }}" alt="{{ $company->company_name}} Cover photo" />
                </div>
            </div>
        </div>
        <div class="row cover-info">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2 col-xs-4">
                        <div class="picture">
                            <div class="photo-wrapper">
                                <img src="{{asset('img/bg-img.png')}}" class="bg-img">
                                <img class="_image" src="{{ $company->company_logo }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row under-photo">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div id="company_name_single_page">
                            <a href="{{ url('companies', $company['id']) }}">
                                {{ $company->company_name }}
                                <br>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 address-established">
                        <div class="single-company-info-wrapper">
                            <div class="li-content-forcom-single i-wrapper">
                                <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="li-content-forcom-single text-wrapper">
                                &nbsp; {{ $company->address1 }}, {{ $company->city }}, {{ $company->country }}
                            </div>
                        </div>
                        <div class="single-company-info-wrapper">
                            <div class="li-content-forcom-single i-wrapper">
                                <i class="fa fa-users fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="li-content-forcom-single text-wrapper">
                                &nbsp; {{ $company->population }}
                            </div>
                        </div>
                        <div class="single-company-info-wrapper">
                            <div class="li-content-forcom-single i-wrapper">
                                <i class="fa fa-laptop fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="li-content-forcom-single text-wrapper">
                                &nbsp;
                                <a href="{{ $company->url }}">
                                    {{ $company->url }}
                                </a>
                            </div>
                        </div>
                        <div class="single-company-info-wrapper">
                            <div class="li-content-forcom-single i-wrapper">
                                <i class="fa fa-file-o fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="li-content-forcom-single text-wrapper">
                                &nbsp;
                                <a href="{{ url('companies', $company->id) }}">
                                    {{ $company->openings->count() }} Current hiring
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="margin-top:12px; margin-bottom:5px;">
<div class="row">
    <div class="col-md-7 col-sm-12 col-xs-12">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 com-single-header">
                <h3 class="">About us:</h3>
            </div>
        </div>

        <div class="row">
            <p class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                {{ $company->what }}
            </p>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 com-single-header">
                <h3 class="">Why join us?:</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <img style="height:100%;width:100%;" src="{{ $company->what_photo1 }}" alt="{{ $company->company_name}} Cover photo" />
                <p style="">
                    {{ $company->what_photo1_explanation }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-12 col-xs-12 com-single-header">
        <h3>Company details:</h3>
        <ul class="company-list-info">

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        CEO:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->ceo_name }}
                    </div>
                <div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Established at:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->established_at }}
                    </div>
                <div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Company website URL:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->url }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Company size:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->company_size }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Email:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->email }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Company address:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->address1 }}, {{ $company->city }}, {{ $company->country }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Company Tel:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->tel }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Language spoken:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->spoken_language }}
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

@if(!empty($company->address1))
    <div class="container text-center" style="height:500px;width:100%; margin-top:50px;">
            {!! Mapper::render() !!}
    </div>
@endif
@if (!Auth::guest())
    @if (Auth::user()->role == 1)
        @if (in_array(Auth::user()->id, $companies_ids))
            <br/>
            {!! link_to(action('CompaniesController@edit', [$company->id]), '編集', ['class' => 'btn btn-primary']) !!}
            <br/>
            {!! Form::open(['method' => 'DELETE', 'url' => ['companies', $company->id]]) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    @endif
@endif

        </div>
    </div>
</div>
@endsection
