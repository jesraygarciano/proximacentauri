@extends('layouts.main-layout')

@section('content')

<?php 
    $skills = return_resume_Skills();
    $resume = \Auth::user()->findFirstOrCreateResume();
    $current_opening_skills = $student ? $student->skills()->pluck('resume_skills.id')->toArray() : ($resume ? $resume->skills()->pluck('resume_skills.id')->toArray() : []);
    $opening=[];
    $provinces=[];
    $countries=[];
    $applied_batches = \Auth::user()->intershipApplication()->pluck('training_batch_id')->toArray();
?>
<script>
$(document).ready(function(){
    $('#notification_li').hide();
    $('.notification-backdrop').hide();
});
</script>
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

    /*Accordion*/
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active, .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

</style>
<div class="container" style="padding-bottom:20px;">
    {!!Form::open(['route' => 'save_application', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form-validate'])!!}
        <input type="hidden" name="id" value="{{$student->id ?? '' }}">
        <div class="row">
            <div class="col-md-7">
                <h4 class="page-header"><i class="fa fa-file-text" aria-hidden="true"></i> Basic Info</h4>

                <div class="ui form">
                    <label>Objective for applying</label>
                    <textarea type="text" name="objective">{{ $student->objectives ?? old('objectives') }}</textarea>
                </div>

                <br />
                <br />

                <div class="ui form">
                        <label>I wan't to sign-up for batch:</label>
                    <select name="batch" class="ui dropdown">
                            <option value="">Select batch</option>
                            @foreach($batches as $batch)
                            {{$batch->id}}
                            {{json_encode($applied_batches)}}
                                @if(!in_array($batch->id, $applied_batches) || ($student ? $student->training_batch_id == $batch->id : false))
                                <option data-value="{{ $batch->id ?? old('batch') }}" data-data="{{json_encode($batch)}}" {{ $student ? ($student->training_batch_id == $batch->id ? 'selected' : '' ) : '' }} value="{{ $batch->id }}">{{ $batch->name }}</option>
                                @endif
                            @endforeach  
                    </select>
                </div>
                <style type="text/css">
                    .batch-info{
                        background: white;
                        border: 1px solid #dddfe2;
                        border-radius: 0.28571429rem;
                    }

                    .batch-info .header{
                        padding: 1rem;
                        border-bottom: 1px solid #e9ebee;
                    }

                    .batch-info .content{
                        padding: 1rem;
                    }
                </style>
                <br>
                <div class="batch-info" id="batch-display">
                    <div class="header">Batch 2</div>
                    <div class="content">
                        <b> Training Date : </b> <span class="start_date">Mar. 08, 2018</span>
                        <br>
                        <b> Schedule : </b> <span class="schedule"></span>
                        <br>
                        <b> Registration Deadline : </b> <span class="regitration_deadline"></span>
                    </div>
                </div>

                <script type="text/javascript">
                    var data = $('[name=batch]').find('option:selected').data('data');
                    if(data){
                        $('#batch-display').show();
                        $('#batch-display').find('.header').html(data.name);
                        $('#batch-display').find('.start_date').html(data.startdate);
                        $('#batch-display').find('.schedule').html(data.schedule);
                        $('#batch-display').find('.regitration_deadline').html(data.regitrationdeadline);
                    }
                    else
                    {
                        $('#batch-display').hide();
                    }
                    $('[name=batch]').change(function(){
                        var data = $(this).find('option:selected').data('data');
                        if(data)
                        {
                            $('#batch-display').show();
                            $('#batch-display').find('.header').html(data.name);
                            $('#batch-display').find('.start_date').html(data.startdate);
                            $('#batch-display').find('.schedule').html(data.schedule);
                            $('#batch-display').find('.regitration_deadline').html(data.regitrationdeadline);
                        }
                        else
                        {
                            $('#batch-display').hide();
                        }
                    });
                </script>

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

        <button class="ui blue button massive pull-right save_application">Save</button>
    {!!Form::close()!!}
</div> 

<script type="text/javascript">
    $(document).ready(function(){
        $('#form-validate').validate({ // initialize the plugin        
            rules: {
                objective: {
                    required: true
                },
                // school: {
                //     required: true
                // },
                // course: {
                //     required: true
                // },
                batch : {
                    required: true
                },
            },
            messages: {
                objective: {
                  required: "Please input your objective."
                },
                // school: {
                //   required: "Please input your school."
                // },
                // course: {
                //   required: "Please input your school."
                // },
                batch: {
                  required: "Please input your preffered batch."
                }
           }
        });

        $('#form-validate .save_application').click(function(){
            var has_skills = false;
            $('#form-validate [name="skills[]"]').each(function(){
                if($(this).val().length > 0){
                    has_skills = true;
                }
            });
            if(!has_skills){
                $('#skill_required').html('Please select atleast one skill.');
                $(document).scrollTop(0);
                return false;
            }
        });

    });

</script>

@endsection
