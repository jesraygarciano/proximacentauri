@extends('layouts.app')

@section('content')

<style type="text/css">
    .error{
        color:red;
    }
    .alert{
    }
    .alert-danger{
        margin: 0 auto 2.5rem auto;
        padding-left: 3rem;
    }
    .alert-danger li{
        list-style-type: square;
    }
    .crop-control .error-label{
        position: absolute;
    }
    .ui.form{
        font-size: 12px;
    }
</style>

    <div class="container">
    {{--@include('inc.message')--}}
    @include('errors.form_errors')

    <h1>Updating your resume</h1>
    <hr/>

        <div class="row">
            <div class="wizard" id="resume-wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                        <ul class="nav progress-nav-tabs" role="tablist">
                            <li role="presentation" class="active resume">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                    <span class="round-tab">
                                        <i class="fa fa-id-card"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled resume">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                    <span class="round-tab">
                                        <i class="fa fa-code"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled resume">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                                    <span class="round-tab">
                                        <i class="fa fa-file-text-o"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled resume">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                    <span class="round-tab">
                                        <i class="fa fa-check"  aria-hidden="true"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                {{-- <form role="form"> --}}
                    {!!Form::open(['action' => ['ResumesController@update', $resume->id], 'method' => 'PATCH', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                        <div class="tab-content">
                                <div class="tab-pane active wizard-step" role="tabpanel" id="step1">
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
                                                    {!!Form::date('birth_date', date_convert($resume->birth_date), ['class' => 'form-control'])!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="field ui calendar required">
                                      <label>日付</label>
                                      <div class="ui input left icon">
                                        <i class="calendar icon"></i>
                                        <input type="text" name="date" placeholder="日付">
                                      </div>
                                    </div> --}}

                                    {{-- <script type="text/javascript">
                                    $('.ui.calendar').calendar({
                                        type: 'date'
                                    })
                                    </script> --}}

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


                                    {{--<h4 class="form-heading">Nationality</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!!Form::text('nationality', null, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <h4 class="form-heading">Gender</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- {!!Form::label('gender', 'Gender:')!!}<br> --}}
                                                    <input name="gender" type="radio" value="male">&nbsp;&nbsp;male&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="gender" type="radio" value="female">&nbsp;&nbsp;female&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="gender" type="radio" checked value="no-answer">&nbsp;&nbsp;no answer
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <h4 class="form-heading">Religion</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!!Form::text('religion', null, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <h4 class="form-heading">Marital Status</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {{-- {!!Form::label('civil_status', 'Marital Status:')!!}<br> --}}
                                                    <input name="marital_status" type="radio" value="single">&nbsp;&nbsp;single&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="marital_status" type="radio" value="married">&nbsp;&nbsp;married&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="marital_status" type="radio" checked value="no-answer">&nbsp;&nbsp;no answer
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

                                    <h4 class="form-heading required-label">Profile picture</h4>
                                    <hr>
                                    <div class = "row">
                                    {{-- <div class="page-header"> --}}
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-6">
                                                <!--<div class="form-group">
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
                                                </div> -->
                                                <div class="crop-control" style="height: 200px; width: 200px;">
                                                  <div class="image-container">
                                                    <img src="{{ $resume->photo }}" alt="{{ $resume->photo}}" />
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

                                    @for ($i=0; $i < 6; $i++)
                                        <?php $number_ed = $i + 1 ?>

                                        @if (count($educations) == 0 && $i == 0)
                                            <div id="educational{{$number_ed}}" class="ed-margin">
                                        @elseif  ($i < count($educations))
                                            <div id="educational{{$number_ed}}" class="ed-margin">
                                        @else
                                            <div id="educational{{$number_ed}}" class="ed-margin default-hide-ed">
                                        @endif

                                            <h4 class="form-heading required-label">Educational Background {{$number_ed}}</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-11">
                                                    <div class="col-md-4">
                                                        <div class="form-group required">
                                                            {!!Form::label('ed_university', 'University', ['class' => 'required-label'])!!}
                                                            {!!Form::text("ed_university_{$number_ed}", $educations[$i]->ed_university ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {!!Form::label('ed_field_of_study', 'Field of study')!!}
                                                            {!!Form::text("ed_field_of_study_{$number_ed}", $educations[$i]->ed_field_of_study ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {!!Form::label('ed_program_of_study', 'Program of study')!!}
                                                            {!!Form::text("ed_program_of_study_{$number_ed}", $educations[$i]->ed_program_of_study ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-11">
                                                    <div class="col-md-8">
                                                        <div class="form-group required">
                                                            {!!Form::label('duration', 'Duration', ['class' => 'required-label'])!!}<br>
                                                            {!!Form::select("ed_from_month_{$number_ed}", month_array(), $educations[$i]->ed_from_month ?? '', ['class' => 'ui dropdown single-select parent-form-group'])!!},
                                                            {!!Form::select("ed_from_year_{$number_ed}", year_array(), $educations[$i]->ed_from_year ?? '', ['class' => 'ui dropdown single-select parent-form-group'])!!}
                                                            &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                                                            {!!Form::select("ed_to_month_{$number_ed}", month_array(), $educations[$i]->ed_to_month ?? '', ['class' => 'ui dropdown single-select parent-form-group'])!!},
                                                            {!!Form::select("ed_to_year_{$number_ed}", year_array(), $educations[$i]->ed_to_year ?? '', ['class' => 'ui dropdown single-select parent-form-group'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {!!Form::hidden("hidden_{$number_ed}", $educations[$i]->id ?? '')!!}
                                        </div>
                                    @endfor

                                    <div class="row">
                                        <button type="button" id="add_ed" class="btn btn-primary pull-right">Add Educational Background</button>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <button type="button" class="btn btn-primary pull-right next-step">Save and continue</button>
                                    </div>
                                </div>



                                <div class="tab-pane wizard-step" role="tabpanel" id="step2">
                                    <h4 class="form-heading  required-label">Summary of your skill/experience</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {!!Form::textarea('summary', $resume->summary, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--{{$resume->id}}--}}
                                                {{-- {{ resume_skill_array('PHP') }} --}}
                                                {{-- {!!Form::select('skills[]', resume_skill_array('PHP'), resume_skill_array('PHP'), ['class' => 'ui fluid normal dropdown multi-select', 'multiple' => 'multiple'])!!} --}}

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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                                @include('inc.dropdown-content')
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
                                                    {!!Form::textarea('other_skills', $resume->other_skills, ['class' => 'form-control'])!!}
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
                                                    {!!Form::textarea('websites', $resume->websites, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    @for ($i=0; $i < 10; $i++)
                                        <?php $number_ex = $i + 1 ?>

                                        @if (count($experiences) == 0 && $i == 0)
                                            <div id="experience{{$number_ex}}" class="ex-margin">
                                        @elseif  ($i < count($experiences))
                                            <div id="experience{{$number_ex}}" class="ex-margin">
                                        @else
                                            <div id="experience{{$number_ex}}" class="ex-margin default-hide-ex">
                                        @endif

                                            <h4 class="form-heading">Experience {{$number_ex}}</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-11">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!!Form::label('ex_company', 'Company:')!!}
                                                            {!!Form::text("ex_company_{$number_ex}", $experiences[$i]->ex_company ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!!Form::label('ex_position', 'Position:')!!}
                                                            {!!Form::text("ex_position_{$number_ex}", $experiences[$i]->ex_postion ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-11">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!!Form::label('duration', 'Duration:')!!}<br>
                                                            {!!Form::select("ex_from_month_{$number_ex}", month_array(), $experiences[$i]->ex_from_month ?? '', ['class' => 'ui dropdown single-select'])!!},
                                                            {!!Form::select("ex_from_year_{$number_ex}", year_array(), $experiences[$i]->ex_from_year ?? '', ['class' => 'ui dropdown single-select'])!!}
                                                            &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                                                            {!!Form::select("ex_to_month_{$number_ex}", month_array(), $experiences[$i]->ex_to_month ?? '', ['class' => 'ui dropdown single-select'])!!},
                                                            {!!Form::select("ex_to_year_{$number_ex}", year_array(), $experiences[$i]->ex_to_year ?? '', ['class' => 'ui dropdown single-select'])!!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!!Form::label('ex_explanation', 'Responsibilities:')!!}
                                                            {!!Form::textarea('ex_explanation', $experiences[$i]->ex_explanation ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor

                                    <div class="row">
                                        <button type="button" id="add_ex" class="btn btn-primary pull-right">Add Experience</button>
                                    </div>

                                    <hr>

                                    <div class="row progress-buttons">
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-default prev-step">Previous</button>
                                            <button type="button" class="btn btn-primary next-step">Save and continue</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane wizard-step" role="tabpanel" id="step3">
                                    <h4 class="form-heading required-label">Objective</h4>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    {{-- {!!Form::label('objective', 'Objective:')!!} --}}
                                                    {!!Form::textarea('objective', $resume->objective, ['class' => 'form-control'])!!}
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



                                    @for ($i=0; $i < 10; $i++)
                                        <?php $number_cr = $i + 1 ?>

                                        @if (count($cr) == 0 && $i == 0)
                                            <div id="cr{{$number_cr}}" class="ex-margin">
                                        @elseif  ($i < count($cr))
                                            <div id="cr{{$number_cr}}" class="ex-margin">
                                        @else
                                            <div id="cr{{$number_cr}}" class="ex-margin default-hide-cr">
                                        @endif

                                            <h4 class="form-heading">Character Reference {{$number_cr}}</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-11">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!!Form::label('cr_company', 'Company:', ['class' => 'required-label'])!!}
                                                            {!!Form::text("cr_company_{$number_cr}", $cr[$i]->cr_company_or_university ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!!Form::label('cr_position', 'Position:')!!}
                                                            {!!Form::text("cr_position_{$number_cr}", $cr[$i]->cr_position ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-offset-1 col-md-11">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {!!Form::label('cr_name', 'Name:', ['class' => 'required-label'])!!}
                                                            {!!Form::text('cr_name_{$number_cr}', $cr[$i]->cr_name ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {!!Form::label('cr_phone_number', 'Phone number:', ['class' => 'required-label'])!!}
                                                            {!!Form::text('cr_phone_number', $cr[$i]->cr_phone_number ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            {!!Form::label('cr_email', 'Email address:')!!}
                                                            {!!Form::text('cr_email', $cr[$i]->cr_email ?? '', ['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor

                                    <div class="row">
                                        <button type="button" id="add_cr" class="btn btn-primary pull-right">Add Character References</button>
                                    </div>

                                    <hr>


                                    {!! Form::hidden('is_active', 1) !!}
                                    {!! Form::hidden('is_master', 1) !!}

                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                        <!-- <li><button type="button" class="btn btn-default next-step">Skip</button></li> -->
                                        <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane wizard-step text-center" role="tabpanel" id="complete">
                                    <h3>Complete</h3>
                                    <p>You have successfully completed all steps.</p>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-info-full">Submit</button>
                                </div>

                        </div>
                    </form>
                </div>
{{--                 </form> --}}
            </div>
        </div>
    </div>


<script type="text/javascript">
    $(document).ready(function(){
        unickwizard($('#resume-wizard'),{
            rules:{

                    // step 1 requirements
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
                    // cr_phone_number:{
                    //     identifier:'cr_phone_number',
                    //     rules:[
                    //         {
                    //             type:'empty',
                    //             prompt:'Company personnel number required'
                    //         }
                    //     ]
                    // },
                }
            }
        );
    });
</script>


@endsection
