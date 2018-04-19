@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="compinfo"> {{--START COMPANYINFO --}}
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
            width: 200px;
        }

        .cover-info .picture img{
            width: 100%;
        }

        .cover-info{
        }

        .cover-info img{
            border:none!important;
        }

        .ui.form{
            font-size: 12px;
        }

        </style>

    {!!Form::open(['url' => route('companies.update',$company->id), 'method' => 'PATCH', 'files' => true, 'enctype' => 'multipart/form-data', 'id' => 'form-validate']) !!}
       @include('errors.form_errors')
        {!! csrf_field() !!}
        <div class="row text-center">

            <div class="col-md-12 cover-info">
                <div class="">
                    {{-- <img src="{{ $company->company_logo }}" alt="{{ $company->company_name}}" /> --}}
                    <div class="ui form">
                        <div class="crop-control" style="height: 100%;" data-width="1200" data-height="400" data-dim="true">
                            <div class="image-container-cover" style="height: 100%;">

                                <img style="width: 100%;" src="{{ $company->background_photo }}" alt="{{ $company->company_name}} Cover photo" />

                                <label for="background_photo" class="input-trigger hover-div" style="width: initial;
                                    left: initial;
                                    height:initial;
                                    right: 10px;
                                    top: 10px;
                                    padding: 10px;
                                    border-radius:3px;
                                    background:#0000008c;">
                                    Update Cover <i class="fa fa-camera" aria-hidden="true"></i>
                                </label>
                            </div>
                            <div class="input-container">
                                <input type="file" id="background_photo" name="background_photo" accept="image/*" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row cover-info" id="openings-title" style="margin:0px; margin-top:-100px;">
                    <div class="col-sm-2">
                        <div class="picture">
                            <div class="photo-wrapper">
                                <div class="ui form">
                                <div class="crop-control" style="height: 200px; width: 200px;">
                                    <div class="image-container">
                                        <img src="{{ $company->company_logo }}" alt="{{ $company->company_name}}" />
                                        
                                        <label for="company_logo" class="input-trigger hover-div" style="width: initial;
                                            left: initial;
                                            height:initial;
                                            left: 10px;
                                            top: 10px;
                                            padding: 5px;
                                            border-radius:3px;
                                            background:#0000008c;">
                                            Update Profile <i class="fa fa-camera" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <div class="input-container">
                                        <input type="file" id="company_logo" name="company_logo" accept="image/*" />
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row" style="text-align:left;">
                            <div class="col-sm-7">
                                <h2 style="padding: 5rem;font-weight: 600;">
                                    <a href="{{ url('companies', $company['id']) }}">
                                        {{ $company->company_name ?? old('company_name') }}
                                        <br>
                                    </a>
                                </h2>
                            </div>
                            <div class="col-sm-5">
                                <div class="row">
                                    <div class="form-group">

                                        {!! Form::label('address1', 'Primary address:', ['class' => 'col-sm-4 control-label']) !!}
                                        <div class = "col-sm-7">
                                            <div class="ui form">
                                                <input type="text" value="{{ $company->address1 ?? old('address1') }}" name="address1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="padding-top: 1rem;">
                                    <div class="form-group">
                                        {!! Form::label('established_at', 'Established date:', ['class' => 'col-sm-4 control-label']) !!}
                                        <div class = "col-sm-7">
                                            {{-- {!!Form::label('birth_date', 'Birth Date:')!!} 
                                            {!!Form::date('established_at', old('established_at'), ['class' => 'form-control', 'placeholder'=>$company->established_at])!!} --}}

                                            <input type="date" min="" max="{{ date('Y-m-d') }}" value="{{ date('Y-m-d',strtotime($company->established_at)) }}"
                                             name="established_at" class="form-control">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <h3>About Us:</h3>
                    <div class="form-group">
                        <div class="ui form">
                                <textarea type="text" name="what">{{ $company->what ?? old('what') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h3>Why join us?:</h3>
                    <div class = "row">
                        <div class="form-group">

                            <div class = "col-md-7">
                                <div class="ui form">
                                    <div class="crop-control" style="height: 100%;" data-width="1200" data-height="400" data-dim="true">
                                        <div class="image-container-cover" style="height: 100%;">
                                            @if(!empty($company->what_photo1))
                                                {{-- <img style="width: 100%;" src="{{ $company->what_photo1 }}" alt="{{ $company->company_name}} Why choose us" /> --}}
                                                <img style="width: 100%;" src="http://www.pek-cy.com/sites/default/files/default-image.png" class="bg-img">

                                            @else
                                                <img style="width: 100%;" src="http://www.pek-cy.com/sites/default/files/default-image.png" class="bg-img">
                                            @endif
                                            <label for="what_photo1" class="input-trigger hover-div">
                                                <p>
                                                    <i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i>
                                                    <br>
                                                    Upload
                                                </p>
                                            </label>
                                        </div>
                                        <div class="input-container">
                                            <input type="file" id="what_photo1" name="what_photo1" accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 1rem;">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="ui form">
                                <textarea type="text" name="what_photo1_explanation">{{ $company->what_photo1_explanation ?? old('what_photo1_explanation') }}</textarea> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-5">
                <h3>Company details:</h3>
                <ul class="company-list-info">
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('email', 'E-Mail Address') !!}
                            </div>
                            <div class="col-sm-7">
                                <div class="ui form">
                                    <input type="email" value="{{ $company->email ?? old('email') }}" name="email">
                                </div>

                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('ceo_name', 'CEO name:') !!}
                            </div>
                            <div class="col-sm-7">
                                <div class="ui form">                                
                                    <input type="text" value="{{ $company->ceo_name ?? old('ceo_name') }}" name="ceo_name">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('url', 'Company website URL') !!}
                            </div>
                            <div class="col-sm-7">
                                <div class="ui form">
                                <input type="url" value="{{ $company->url ?? old('url') }}" name="url">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('company_size', 'Company size') !!}
                            </div>

                            <div class="col-sm-7">
                                <div class="ui form">
                                    <input type="number" value="{{ $company->company_size ?? old('company_size') }}" name="company_size">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('tel', 'Company Tel#') !!}
                            </div>
                            <div class="col-sm-7">
                                <div class="ui form">
                                    <input type="tel" value="{{ $company->tel ?? old('tel') }}" name="tel">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('city', 'City address') !!}
                            </div>
                            <div class="col-sm-7">
                                <div class="ui form">
                                    <input type="text" value="{{ $company->city ?? old('city') }}" name="city">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('country', 'Country') !!}
                            </div>
                            <div class="col-sm-7">
                                <div class="ui form">
                                    <input type="text" value="{{ $company->country ?? old('country') }}" name="country">
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-sm-4">
                                {!! Form::label('spoken_language', 'Spoken language') !!}
                            </div>
                            <div class="col-sm-7">
                                <div class="ui form">
                                    <input type="text" value="{{ $company->spoken_language ?? old('spoken_language') }}" name="spoken_language">
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container"></div>
        <div class="row text-center">
            <div class="form-group">
                {!!Form::submit('Update company', ['class' => 'btn btn-primary'])!!}
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

    $('#form-validate').validate({ // initialize the plugin
        rules: {
            email: {
                required: true,
                maxlength: 70,
                minlength: 5
            },
            tel: {
                required: true,
                minlength: 3
            },
            address1: {
                required: true,
            },
            what: {
                required: true,
            },
            what_photo1_explanation: {
                required: true,
            },            
            established_at: {
                required: true,
            },
            url: {
                required: true,
            },
            company_size: {
                required: true,
            },
            city: {
                required: true,
            },
            country: {
                required: true,
            },
            spoken_language: {
                required: true
            }
        },
        messages: {
            email: {
                required: 'Please enter email address',
            },
            tel: {
                required: 'Company contact# is required',
            },
            address1: {
                required: 'Please add company address',
            },
            what: {
                required: 'This field is required',
            },
            what_photo1_explanation: {
                required: 'This field is required',
            },            
            established_at: {
                required: 'Dates is required',
            },
            url: {
                required: 'Company URL is required',
            },
            company_size: {
                required: 'Please provide company size',
            },
            city: {
                required: 'Please provide address',
            },
            country: {
                required: 'Please provice country',
            },
            spoken_language: {
                required: 'Please provice country',
            }
       }
    });

});
</script>

@endsection
