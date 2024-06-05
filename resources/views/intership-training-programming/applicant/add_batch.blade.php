@extends('layouts.main-layout')

@section('content')

<?php 
    $skills = return_resume_Skills();
    $current_opening_skills = $student ? $student->skills()->pluck('resume_skills.id')->toArray() : [];
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
<div class="container" style="padding-bottom:20px;">
    {!!Form::open(['route' => 'save_batches', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form-validate'])!!}
        <input type="hidden" name="id" value="{{$student->id ?? '' }}">
        <div class="row">
            <div class="col-md-7">
                <h4 class="page-header"><i class="fa fa-file-text" aria-hidden="true"></i> Basic Info</h4>

                <div class="ui form">
                        <label>I wan't to sign-up for batch:</label>
                    <select name="batch" class="ui dropdown">
                            <option value="">Select batch</option>
                            @foreach($batch as $batches)
                                <option data-value="{{ $batches->id ?? old('batches') }}" {{ $student ? ($student->training_batch_id == $batches->id ? 'selected' : '' ) : '' }} value="{{ $batches->id }}">{{ $batches->name }}</option>
                            @endforeach
                    </select>
                </div>

                <br />
                <br />

            </div>
        </div>
        <button class="ui blue button massive pull-right save_application">Save</button>
    {!!Form::close()!!}
</div> 

<script type="text/javascript">
    $(document).ready(function(){
        $('#form-validate').validate({ // initialize the plugin        
            rules: {
                batch : {
                    required: true
                },
            },
            messages: {
                batch: {
                  required: "Please input your preffered batch."
                }
           }       
        });
    });
</script>

@endsection
