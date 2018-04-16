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
    form{
        padding: 10px;
    }
</style>
<div class="container">
    <h1>Write a New Companies</h1>

    <hr/>

    @include('errors.form_errors')

    {!!Form::open(['route' => 'companies.store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'form-validate'])!!}
        <div class="row">
            <div class="ui form">
                <div class="form-group">
                    {!!Form::label('company_name', 'Company Name')!!}
                    {!!Form::text('company_name', null, ['class' => 'form-control'])!!}
                </div>
            </div>
        </div>
        <div class="row">
           <div class="ui form">            
                <div class="form-group">
                    {!!Form::label('email', 'Email')!!}
                    {!!Form::text('email', null, ['class' => 'form-control'])!!}
                </div>
            </div>
        </div>
        <div class="row">
           <div class="ui form">
                <div class="form-group">
                    {!!Form::label('tel', 'Tel')!!}
                    {!!Form::text('tel', null, ['class' => 'form-control'])!!}
                </div>
            </div>
        </div>
        <div class="row">
           <div class="ui form">            
            <div class="form-group">
                {!! Form::label('company_logo','Company Logo')!!}
                <div class="crop-control" style="height: 200px; width: 200px;">
                  <div class="image-container">
                    <img src="https://grangeprint.com/image/cache/placeholder-750x750-nofill-255255255.png">
                    <label for="company_logo" class="input-trigger hover-div">
                      <p>
                        <i class="fa fa-file-image-o fa-5x" aria-hidden="true"></i>
                        <br>
                        Upload
                      </p>
                    </label>
                  </div>
                  <div class="input-container">
                    <input type="file" id="company_logo" name="company_logo" accept="image/*" />
                  </div>
                </div>
             </div>
            </div>
        </div>
        <br />
        <div class="row">
           <div class="col-md-6">
           <div class="ui form">
                <div class="form-group">
                    {!!Form::label('established_at', 'Date established')!!}
                    {!!Form::date('established_at', null, ['class' => 'form-control'])!!}
                </div>
            </div>                
            </div>
        </div>
        <br />
        <div class="row">
            <div class="form-group">
                {!!Form::submit('Register Company', ['class' => 'btn btn-primary'])!!}
            </div>
        </div>
    {!!Form::close()!!}
</div>
<script type="text/javascript">

    $(document).ready(function () {

    $('#form-validate').validate({ // initialize the plugin
        rules: {
            company_name: {
                required: true,
                maxlength: 70,
                minlength: 5
            },
            email: {
                required: true,
                minlength: 3,
                email: true
            },
            company_logo: {
                required: true
            },
            established_at: {
                required: true
            },            
            tel: {
                required: true
            }
        },
        messages: {
            company_name: {
                required: Provide company name
            },
            email: {
                required: Please provide email address,
                email: Please provide valid email address,
            },
            company_logo: {
                required: Company logo is required
            },
            tel: {
                required: Provide comapany tel#
            },
            established_at: {
                required: Provide company established date
            }            
       }
    });

});
</script>
@endsection
