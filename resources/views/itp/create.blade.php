@extends('layouts.app')

@section('content')

<?php 
    $skills = return_resume_Skills();
    $current_opening_skills = [];
    $opening=[];
    $provinces=[];
    $countries=[];
?>

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
        list-style-type: lower-alpha;        
    }
    .ui.form{
        font-size: 12px;
    }

    .page-header .fa{
        color: #0f739b;
    }
    fieldset.scheduler-border {
        border: 1px groove rgba(34, 36, 38, 0.15) !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
    }

        legend.scheduler-border {
            font-size: 1em !important;
            font-weight: bold !important;
            text-align: left !important;
            width:auto;
            padding:0 10px;
            border-bottom:none;
        }

        #opening_city{
            padding: 1.1rem 1rem;
        }
        #postal-code-add{
            padding: 1.1rem 1rem;
        }

        #expiredate{
            font-size: 13px;
            font-weight: bold;
            color: #962525;
        }


</style>

<div class="container" style="padding-top:20px;">
    <div class="row">
        <div class="col-md-7">
            <h4 class="page-header"><i class="fa fa-file-text" aria-hidden="true"></i> Basic Info</h4>

            <div class="ui form">
                <label>Objective for applying</label>
                <textarea type="text" name="objective">{{ $opening->details ?? old('details') }}</textarea>
            </div>

            <br />

            <div class="ui form">
                <label>School</label>
                <input type="text" name="school">
            </div>

            <br />

            <div class="ui form">
                <label>Course</label>
                <select name="course" class="ui dropdown">
                    <option value="">Select</option>
                    <option value="BSIT">BSIT</option>
                    <option value="BSCS">BSCS</option>
                    <option value="ACT">ACT</option>
                </select>
            </div>

            <br />

            {{--@if(empty($opening->from_post)) --}}
            <div class="ui form">
                <label>Preffered Training Date</label>
                <input style="font-size: 1.1em;" type="date" min="{{ date('Y-m-d') }}" name="preffered_training_date">
            </div>
            <br />
            <br />

        </div>
        <div class="col-md-5">
            <h4 class="page-header">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                Skill
                <span id="skill_required" style="color:#a94442;"></span>
            </h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>PHP</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "PHP")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}} >{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Ruby</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Ruby")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Java</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Java")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>C++</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "C++")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Python</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Python")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Swift</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Swift")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Go</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Go")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>C#</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "C#")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Javascript</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Javascript")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Node.js</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Node.js")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>version control</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "version control")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>CSS framework</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "CSSframework")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>CSS preprocessors</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "CSSpreprocessors/postprocessors")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cloud hosting</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Cloud hosting")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mobile app programming</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Mobileappprogramming")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Database</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "Database")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Other Languages</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "otherlanguages")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Other tools</label>
                        <select multiple="" name="skills[]" class="ui fluid normal dropdown multi-select">
                            <option value="">Select</option>
                            @for($i=0; $i < count($skills) ; $i++)
                                @if($skills[$i]->language == "othertools")
                                    <option value={{$skills[$i]->id}} {{in_array($skills[$i]->id,$current_opening_skills) ? 'selected' : ''}}>{{$skills[$i]->category}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<script type="text/javascript"></script>

@endsection
