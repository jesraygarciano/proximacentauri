@extends('layouts.app')

@section('content')

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
                                        <div class="form-group">
                                            {{-- {!!Form::file('photo')!!} --}}
                                            <div class="imagePreview"></div>
                                            <div class="input-group">
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        Choose File<input type="file" name="photo" style="display:none" class="uploadFile">
                                                    </span>
                                                </label>
                                                <input type="text" class="form-control" readonly="">
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
            <h3>Opening Information</h3>
            <div class="container" id="show_opening"> {{-- START OF SHOW OPENING --}}
                <div class="row text-center">
                    <div class="col-md-12">
                        <img src="{{ asset('img/opening_banner.png') }}" />
                    </div>
                </div>
                <div class="row" id="openings-title">
                    <div class="col-md-2">
                        <span class="contain" style="background-image: url('{{ $opening->company->company_logo }}');  position: absolute; left:35px; top: -40px;"></span>
                    </div>
                    <div class="col-md-10">
                        <h1 style="word-wrap: break-word;">{{ $opening->title }}</h1>
                        <h4>
                            <a href="{{ url('companies', $company->id) }}">
                                {{ $company->company_name }}
                                <br>
                            </a>
                        </h4>
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
                        </div>
                        <div class="job-qualify">
                            <h4>
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                Job Qualifications:
                            </h4>
                            <hr />
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
                {{-- <hr>
                {!! link_to(action('ApplicationController@create', [$opening->id]), 'Application Form', ['class' => 'btn btn-danger']) !!} --}}
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
                        f_name:{
                            identifier:'f_name',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your first name'
                                }
                            ]
                        },
                        l_name:{
                            identifier:'l_name',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your last name'
                                }
                            ]
                        },
                        phone_number:{
                            identifier:'phone_number',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your phone number'
                                }
                            ]
                        },
                        email:{
                            identifier:'email',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your email'
                                }
                            ]
                        },
                        birth_date:{
                            identifier:'birth_date',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your birthdate'
                                }
                            ]
                        },
                        address1:{
                            identifier:'address1',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your address1'
                                }
                            ]
                        },
                        address2:{
                            identifier:'address2',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your address2'
                                }
                            ]
                        },
                        city:{
                            identifier:'city',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your city'
                                }
                            ]
                        },
                        country:{
                            identifier:'country',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your country'
                                }
                            ]
                        },
                        postal:{
                            identifier:'postal',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your postal'
                                }
                            ]
                        },
                        spoken_language:{
                            identifier:'spoken_language',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your spoken language'
                                }
                            ]
                        },
                        ed_university:{
                            identifier:'ed_university',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'Please enter your university'
                                }
                            ]
                        },
                        ed_from_month:{
                            identifier:'ed_from_month',
                            type:'semantic-group',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'month start'
                                }
                            ]
                        },
                        ed_from_year:{
                            identifier:'ed_from_year',
                            type:'semantic-group',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'year start'
                                }
                            ]
                        },
                        ed_to_month:{
                            identifier:'ed_to_month',
                            type:'semantic-group',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'month end'
                                }
                            ]
                        },
                        ed_to_year:{
                            identifier:'ed_to_year',
                            type:'semantic-group',
                            rules: [
                                {
                                    type:'empty',
                                    prompt:'year end'
                                }
                            ]
                        },


                        // step 2 requirements
                        summary:{
                            identifier:'summary',
                            rules:[
                                {
                                    type:'empty',
                                    prompt:'Skill/Experience Summary required'
                                }
                            ]
                        },

                        // step 3 requirements
                        objective:{
                            identifier:'objective',
                            rules:[
                                {
                                    type:'empty',
                                    prompt:'Objective required'
                                }
                            ]
                        },
                        cr_company:{
                            identifier:'cr_company',
                            rules:[
                                {
                                    type:'empty',
                                    prompt:'Company / University name required'
                                }
                            ]
                        },
                        cr_name:{
                            identifier:'cr_name',
                            rules:[
                                {
                                    type:'empty',
                                    prompt:'Company personnel name required'
                                }
                            ]
                        },
                        cr_phone_number:{
                            identifier:'cr_phone_number',
                            rules:[
                                {
                                    type:'empty',
                                    prompt:'Company personnel number required'
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
            .cover-image{
                position: relative;
                height: 300px;
                background: #c8c8c8;
                overflow: hidden;
                border: 1px solid #cecece;
            }

            .cover-image img{
                position: absolute;
                top: 50%;
                transform:translateY(-50%);
                width: 100%;
                left: 0px;
            }

            .cover-info .picture{
                padding: 5px;
                background: white;
                border: 1px solid #cecece;
                position: relative;
            }

            .cover-info .picture img{
                width: 100%;
            }

            .cover-info{
            }

            .cover-info img{
                border:none!important;
            }
            </style>

            <div class="row text-center">
                <div class="col-md-12 cover-info">
                    <div class="cover-image">
                        <img src="{{ $company->company_logo }}" alt="{{ $company->company_name}}" />
                    </div>
                    <div class="row cover-info" id="openings-title" style="margin:0px; margin-top:-100px;">
                        <div class="col-sm-2">
                            <div class="picture">
                                <div class="photo-wrapper">
                                    <img src="{{asset('img/bg-img.png')}}" class="bg-img">
                                    <img class="_image" src="{{ $company->company_logo }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row" style="text-align:left;">
                                <div class="col-sm-6">
                                    <h1>
                                        <a href="{{ url('companies', $company['id']) }}">
                                            {{ $company->company_name }}
                                            <br>
                                        </a>
                                    </h1>
                                </div>
                                <div class="col-sm-6">
                                    <h5>
                                        <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                                        &nbsp; {{ $company->city }}, {{ $company->country }}
                                    </h5>
                                    <h5>
                                        <i class="fa fa-calendar fa-lg" aria-hidden="true"></i>
                                        &nbsp; {{ $company->created_at }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <hr>
            <div class="row">
                <div class="col-md-8">
                    <h3>About us:</h3>
                    {{ $company->what }}
                </div>
                <div class="col-md-4">
                    <h3>Company details:</h3>
                    <ul class="company-list-info">
                        <li>
                            <div class="field-name">Email</div>
                            <div class="field-value">{{ $company->email }}</div>
                        </li>
                        <li>
                            <div class="field-name">CEO</div>
                            <div class="field-value">{{ $company->ceo_name }}</div>
                        </li>
                        <li>
                            <div class="field-name">COO</div>
                            <div class="field-value">{{ $company->in_charge }}</div>
                        </li>
                        <li>
                            <div class="field-name">Address(s)</div>
                            <div class="field-value">{{ $company->address1 }}</div>
                            <div class="field-value">{{ $company->address2 }}</div>
                        </li>
                        <li>
                            <div class="field-name">City</div>
                            <div class="field-value">{{ $company->city }}</div>
                        </li>
                        <li>
                            <div class="field-name">Country</div>
                            <div class="field-value">{{ $company->country }}</div>
                        </li>
                        <li>
                            <div class="field-name">Website</div>
                            <div class="field-value">{{ $company->url }}</div>
                        </li>
                        <li>
                            <div class="field-name">Contact</div>
                            <div class="field-value">{{ $company->tel }} (Tel)</div>
                        </li>
                        <li>
                            <div class="field-name">Employees</div>
                            <div class="field-value">{{ $company->number_of_employee }}</div>
                        </li>
                    </ul>
                </div>
            </div>

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
