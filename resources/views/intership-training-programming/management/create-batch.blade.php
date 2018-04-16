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
    @include('errors.form_errors')
    {!!Form::open(['route' => 'post_create_batch', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form-validate'])!!}
        <input type="hidden" name="batch_id" value="{{@$batch->id}}">
        <h4 class="page-header"><i class="fa fa-file-text" aria-hidden="true"></i> {{ $batch ? 'Update' : 'Create' }} Batch</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="ui form">
                    <label>Batch Name</label>
                    <input type="text" name="name" value="{{@$batch->name}}">
                </div>

                <br />

                {{--@if(empty($opening->from_post)) --}}
                <div class="ui form">
                    <label>Start Date</label>
                    <input style="font-size: 1.1em;" type="date" min="{{ date('Y-m-d') }}" value="{{ @$batch->start_date }}" name="start_date">
                </div>
                <br />

                <div class="ui form">
                    <label>Schedule</label>
                    <input style="font-size: 1.1em;" name="schedule" value="{{ @$batch->schedule }}">
                </div>
                <br />

                <div class="ui form">
                    <label>Registration Deadline Date</label>
                    <input style="font-size: 1.1em;" type="date" min="{{ date('Y-m-d') }}" value="{{ @$batch->regitration_deadline }}" name="regitration_deadline">
                </div>
                <br />

            </div>
            <div class="col-md-6">
                <div class="ui form">
                    <label>Training Description</label>
                    <textarea type="text" name="description">{{ @$batch->description }}</textarea>
                </div>
            </div>

        </div>
        <br />
        <button class="ui blue button massive pull-right save_application">Save</button>
    {!!Form::close()!!}
</div> 

<script type="text/javascript">
    $(document).ready(function(){
        $('#form-validate').validate({ // initialize the plugin        
            rules: {
                name: {
                    required: true
                },
                start_date: {
                    required: true
                },
                regitration_deadline: {
                    required: true
                },
                schedule: {
                    required: true
                },
                description:{
                    required: true
                }
            },
            messages: {
                name: {
                  required: "Please input batch name."
                },
                start_date: {
                  required: "Please input batch start date."
                },
                regitration_deadline: {
                  required: "Please input batch registation deadline date."
                },
                schedule: {
                  required: "Please input batch schedule."
                },
                description: {
                  required: "Please input batch description."
                }
           }       
        });
    });
</script>

@endsection
