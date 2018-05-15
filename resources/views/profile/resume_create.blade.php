@extends('layouts.main-layout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/progress_bar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/croppie.css')}}">
<link href="{{ asset('css/components/image-cropper-component.css') }}" rel="stylesheet">
<link href="{{ asset('css/components/input-validation-component.css') }}" rel="stylesheet">
<link href="{{ asset('css/form.css') }}" rel="stylesheet">
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
@endsection

@section('content')

@include('includes.image-cropper')

    <div class="container">
    {{-- @include('includes.message') --}}
    @include('errors.form_errors')

    <h1>Profile Wizard</h1>
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
                    {!!Form::open(['route' => 'resume_save', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
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
                                                    {!!Form::text('f_name', $user->f_name, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!!Form::label('m_name', 'Middle Name')!!}
                                                    {!!Form::text('m_name', $user->m_name, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group required">
                                                    {!!Form::label('l_name', 'Last Name', ['class' => 'required-label'])!!}
                                                    {!!Form::text('l_name', $user->l_name, ['class' => 'form-control'])!!}
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
                                                    {!!Form::number('phone_number', null, ['class' => 'form-control'])!!}
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
                                                    {!!Form::text('email', $user->email, ['class' => 'form-control'])!!}
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
                                                    {!!Form::date('birth_date', null, ['class' => 'form-control'])!!}
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
                                                    {!!Form::text('address1', null, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group required">
                                                    {!!Form::label('address2', 'Address2', ['class' => 'required-label'])!!}
                                                    {!!Form::text('address2', null, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group required">
                                                    {!!Form::label('city', 'City', ['class' => 'required-label'])!!}
                                                    {!!Form::text('city', null, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-11">
                                            <div class="col-md-4">
                                                <div class="form-group required">
                                                    {!!Form::label('country', 'Country', ['class' => 'required-label'])!!}
                                                    {!!Form::text('country', null, ['class' => 'form-control'])!!}
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group required">
                                                    {!!Form::label('postal', 'Postal Code', ['class' => 'required-label'])!!}
                                                    {!!Form::number('postal', null, ['class' => 'form-control'])!!}
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
                                                    <input name="gender" type="radio" checked value="male">&nbsp;&nbsp;male&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="gender" type="radio" value="female">&nbsp;&nbsp;female&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input name="gender" type="radio" checked value="no-answer">&nbsp;&nbsp;no answer
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        {{--
                                    <h4 class="form-heading">Religion</h4>
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
                                                    <input name="marital_status" type="radio" checked value="single">&nbsp;&nbsp;single&nbsp;&nbsp;&nbsp;&nbsp;
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
                                                    {!!Form::text('spoken_language', null, ['class' => 'form-control'])!!}
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
                                                <!-- <div class="form-group"> -->
                                                    {{-- {!!Form::file('photo')!!} --}}
                                                    <!-- <div class="imagePreview"></div>
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
                                                    <img src="https://grangeprint.com/image/cache/placeholder-750x750-nofill-255255255.png">
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
                                    <br />
                                    <br />

                                    <input name="educational_backgrounds" type="hidden">
                                    <div id="educational_backgrounds"></div>
                                    <div>
                                        <button type="button" id="add_ed_back" class="btn btn-primary pull-right">Add Educational Background</button>
                                    </div>
                                    <script>
                                        $(document).ready(function(){
                                            add_another_education();

                                            $('#add_ed_back').click(function(){
                                                var e_b_element = $('#educational_backgrounds');
                                                var num = parseInt(e_b_element.find('.ed-margin').length);
                                                if(num < 6)
                                                {
                                                    add_another_education();
                                                    if(num == 6){
                                                        $('#add_ed_back').hide();
                                                    }
                                                }
                                            });
                                            
                                            function add_another_education(data){
                                                var e_b_element = $('#educational_backgrounds');
                                                var html = '<div class="ed-margin">';
                                                var num = (parseInt(e_b_element.find('.ed-margin').length)+1);
                                                html += '<h4 class="form-heading required-label">Educational Background '+num+'</h4>'
                                                +'    <hr>'
                                                +'    <div class="row">'
                                                +'        <div class="col-md-offset-1 col-md-11">'
                                                +'            <div class="col-md-4">'
                                                +'                <div class="form-group required">'
                                                +'                    <label for="ed_university'+num+'" class="required-label">University</label>'
                                                +'                    <input class="form-control ed_university" name="ed_university'+num+'" type="text" value="">'
                                                +'<label class="error-label">Please enter your spoken language</label>'
                                                +'                </div>'
                                                +'            </div>'
                                                +'            <div class="col-md-4">'
                                                +'                <div class="form-group">'
                                                +'                    <label for="ed_field_of_study'+num+'">Field of study</label>'
                                                +'                    <input class="form-control ed_field_of_study" name="ed_field_of_study'+num+'" type="text" value="">'
                                                +'<label class="error-label">Please enter your spoken language</label>'
                                                +'                </div>'
                                                +'            </div>'
                                                +'            <div class="col-md-4">'
                                                +'                <div class="form-group">'
                                                +'                    <label for="ed_program_of_study'+num+'">Program of study</label>'
                                                +'                    <input class="form-control ed_program_of_study" name="ed_program_of_study'+num+'" type="text" value="">'
                                                +'<label class="error-label">Please enter your spoken language</label>'
                                                +'                </div>'
                                                +'            </div>'
                                                +'        </div>'
                                                +'    </div>'

                                                +'    <div class="row">'
                                                +'        <div class="col-md-offset-1 col-md-11">'
                                                +'            <div class="col-md-8">'
                                                +'                <div class="form-group parent-form-group required">'
                                                +'                    <label for="duration" class="required-label">Duration</label><br>'
                                                +'                    {!!Form::select("ed_from_month", month_array(), null, ['class' => 'ed_from_month ui dropdown single-select parent-form-group'])!!},'
                                                +'                    {!!Form::select("ed_from_year", year_array(), null, ['class' => 'ed_from_year ui dropdown single-select parent-form-group'])!!}'
                                                +'                    &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'
                                                +'                    {!!Form::select("ed_to_month", month_array(), null, ['class' => 'ed_to_month ui dropdown single-select parent-form-group'])!!},'
                                                +'                    {!!Form::select("ed_to_year", year_array(), null, ['class' => 'ed_to_year ui dropdown single-select parent-form-group'])!!}'
                                                +'                </div>'
                                                +'            </div>'
                                                +'        </div>'
                                                +'    </div>'
                                                +'</div>';

                                                e_b_element.append(html);
                                                e_b_element.find('.ed-margin:last-child .single-select').dropdown();
                                                e_b_element.find('.ed-margin:last-child').find('input,select,textarea').change(function(){
                                                    if($(this).parent().hasClass('parent-form-group')){
                                                        $(this).parent().removeClass('error-border');
                                                        $(this).parent().parent().find('.error-label .'+$(this).attr('name')).remove();

                                                        if($(this).parent().parent().find('.error-border').length < 1){
                                                            $(this).parent().parent().removeClass('has-error');
                                                        }
                                                    }
                                                    else if($(this).parent().parent().parent().hasClass('input-group')){
                                                        $(this).parent().parent().parent().parent().removeClass('has-error');
                                                    }
                                                    else
                                                    {
                                                        $(this).parent().removeClass('has-error');
                                                    }
                                                });
                                            }
                                        });
                                    </script>

                                    <br>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary pull-right next-step">Save and continue</button>
                                        </div>
                                    </div>
                                </div>
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
                                    <!-- <script>
                                        $(document).ready(function(){
                                            add_another_education();

                                            $('#add_ed_back').click(function(){
                                                var e_b_element = $('#educational_backgrounds');
                                                var num = parseInt(e_b_element.find('.ed-margin').length);
                                                if(num < 6)
                                                {
                                                    add_another_education();
                                                    if(num == 6){
                                                        $('#add_ed_back').hide();
                                                    }
                                                }
                                            });
                                            
                                            function add_another_education(data){
                                                var e_b_element = $('#educational_backgrounds');
                                                var html = '<div class="ed-margin">';
                                                var num = (parseInt(e_b_element.find('.ed-margin').length)+1);
                                                html += '<h4 class="form-heading required-label">Educational Background '+num+'</h4>'
                                                +'    <hr>'
                                                +'    <div class="row">'
                                                +'        <div class="col-md-offset-1 col-md-11">'
                                                +'            <div class="col-md-4">'
                                                +'                <div class="form-group required">'
                                                +'                    <label for="ed_university'+num+'" class="required-label">University</label>'
                                                +'                    <input class="form-control ed_university" name="ed_university'+num+'" type="text" value="">'
                                                +'<label class="error-label">Please enter your spoken language</label>'
                                                +'                </div>'
                                                +'            </div>'
                                                +'            <div class="col-md-4">'
                                                +'                <div class="form-group">'
                                                +'                    <label for="ed_field_of_study'+num+'">Field of study</label>'
                                                +'                    <input class="form-control ed_field_of_study" name="ed_field_of_study'+num+'" type="text" value="">'
                                                +'<label class="error-label">Please enter your spoken language</label>'
                                                +'                </div>'
                                                +'            </div>'
                                                +'            <div class="col-md-4">'
                                                +'                <div class="form-group">'
                                                +'                    <label for="ed_program_of_study'+num+'">Program of study</label>'
                                                +'                    <input class="form-control ed_program_of_study" name="ed_program_of_study'+num+'" type="text" value="">'
                                                +'<label class="error-label">Please enter your spoken language</label>'
                                                +'                </div>'
                                                +'            </div>'
                                                +'        </div>'
                                                +'    </div>'

                                                +'    <div class="row">'
                                                +'        <div class="col-md-offset-1 col-md-11">'
                                                +'            <div class="col-md-8">'
                                                +'                <div class="form-group parent-form-group required">'
                                                +'                    <label for="duration" class="required-label">Duration</label><br>'
                                                +'                    {!!Form::select("ed_from_month", month_array(), null, ['class' => 'ed_from_month ui dropdown single-select parent-form-group'])!!},'
                                                +'                    {!!Form::select("ed_from_year", year_array(), null, ['class' => 'ed_from_year ui dropdown single-select parent-form-group'])!!}'
                                                +'                    &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;'
                                                +'                    {!!Form::select("ed_to_month", month_array(), null, ['class' => 'ed_to_month ui dropdown single-select parent-form-group'])!!},'
                                                +'                    {!!Form::select("ed_to_year", year_array(), null, ['class' => 'ed_to_year ui dropdown single-select parent-form-group'])!!}'
                                                +'                </div>'
                                                +'            </div>'
                                                +'        </div>'
                                                +'    </div>'
                                                +'</div>';

                                                e_b_element.append(html);
                                                e_b_element.find('.ed-margin:last-child .single-select').dropdown();
                                                e_b_element.find('.ed-margin:last-child').find('input,select,textarea').change(function(){
                                                    if($(this).parent().hasClass('parent-form-group')){
                                                        $(this).parent().removeClass('error-border');
                                                        $(this).parent().parent().find('.error-label .'+$(this).attr('name')).remove();

                                                        if($(this).parent().parent().find('.error-border').length < 1){
                                                            $(this).parent().parent().removeClass('has-error');
                                                        }
                                                    }
                                                    else if($(this).parent().parent().parent().hasClass('input-group')){
                                                        $(this).parent().parent().parent().parent().removeClass('has-error');
                                                    }
                                                    else
                                                    {
                                                        $(this).parent().removeClass('has-error');
                                                    }
                                                });
                                            }
                                        });
                                    </script> -->
                                    <div class="row">
	                                    <div class="col-md-12">
		                                    <ul class="list-inline pull-right">
		                                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
		                                        <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
		                                    </ul>
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
                                    {!! Form::hidden('is_master', 1) !!}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                <!-- <li><button type="button" class="btn btn-default next-step">Skip</button></li> -->
                                                <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane wizard-step text-center" role="tabpanel" id="complete">
                                    <h3>Complete</h3>
                                    <p>You have successfully completed all steps.</p>
                                    <!-- <p>Please click submit button.</p> -->
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-info-full">Submit</button>
                                </div>

                        </div>
                    </form>
                </div>
            </div>
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
                                type:'empty',
                                prompt:'Photo required'
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
                                type:'phone',
                                prompt:'Please enter your valid phone number'
                            }
                        ]
                    },
                    email:{
                        identifier:'email',
                        rules: [
                            {
                                type:'email',
                                prompt:'Please enter valid email address'
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
                                prompt:'Please enter your first address'
                            }
                        ]
                    },
                    address2:{
                        identifier:'address2',
                        rules: [
                            {
                                type:'empty',
                                prompt:'Please enter your secondary address'
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
                    educational_backgrounds:{
                        identifier:'educational_backgrounds',
                    },
                    // ed_university:{
                    //     identifier:'ed_university',
                    //     rules: [
                    //         {
                    //             type:'empty',
                    //             prompt:'Please enter your university'
                    //         }
                    //     ]
                    // },
                    // ed_from_month:{
                    //     identifier:'ed_from_month',
                    //     type:'date-range',
                    //     rules: [
                    //         {
                    //             type:'empty',
                    //             prompt:'month start'
                    //         }
                    //     ]
                    // },
                    // ed_from_year:{
                    //     identifier:'ed_from_year',
                    //     type:'date-range',
                    //     rules: [
                    //         {
                    //             type:'empty',
                    //             prompt:'year start'
                    //         }
                    //     ]
                    // },
                    // ed_to_month:{
                    //     identifier:'ed_to_month',
                    //     type:'date-range',
                    //     rules: [
                    //         {
                    //             type:'empty',
                    //             prompt:'month end'
                    //         }
                    //     ]
                    // },
                    // ed_to_year:{
                    //     identifier:'ed_to_year',
                    //     type:'date-range',
                    //     rules: [
                    //         {
                    //             type:'empty',
                    //             prompt:'year end'
                    //         }
                    //     ]
                    // },


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


@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('js/wizard.js')}}"></script>
<script type="text/javascript" src="{{asset('js/croppie.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/form.js')}}"></script>
@endsection
