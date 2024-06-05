@extends('layouts.main-layout')

@section('css')
<style type="text/css">
    /* USER PROFILE PAGE */
    .card{
        /*margin-top: 20px;*/
        padding: 30px;
        background-color: rgba(214, 224, 226, 0.2);
        -webkit-border-top-left-radius:5px;
        -moz-border-top-left-radius:5px;
        border-top-left-radius:5px;
        -webkit-border-top-right-radius:5px;
        -moz-border-top-right-radius:5px;
        border-top-right-radius:5px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .card.hovercard {
        position: relative;
        /*padding-top: 0;*/
        overflow: hidden;
        text-align: center;
        background-color: #fff;
        background-color: rgba(255, 255, 255, 1);
    }
    .card.hovercard .card-background {
        height: 130px;
    }
    .card-background img {
        -webkit-filter: blur(7px);
        -moz-filter: blur(7px);
        -o-filter: blur(7px);
        -ms-filter: blur(7px);
        filter: blur(7px);
        margin-left: -100px;
        margin-top: -200px;
        min-width: 130%;
    }
    .card.hovercard .useravatar {
        position: absolute;
        top: 45px;
        left: 0;
        right: 0;
    }
    .card.hovercard .useravatar img {
        width: 100px;
        height: 100px;
        max-width: 100px;
        max-height: 100px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: 5px solid rgba(255, 255, 255, 0.5);
    }
    .card.hovercard .card-info {
        position: absolute;
        bottom: 14px;
        left: 0;
        right: 0;
    }
    .card.hovercard .card-info .card-title {
        padding:0 5px;
        font-size: 20px;
        line-height: 1;
        color: #d8d8d8;
        background-color: rgba(255, 255, 255, 0.1);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }
    .card.hovercard .card-info {
        overflow: hidden;
        font-size: 12px;
        line-height: 20px;
        color: #737373;
        text-overflow: ellipsis;
    }
    .card.hovercard .bottom {
        padding: 0 20px;
        margin-bottom: 17px;
    }
    .btn-pref .btn {
        -webkit-border-radius:0 !important;
    }

    #batch-cont{
        /*margin: 2rem;*/
        padding: 3.5rem 0rem;
        background: #fff;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
        border: 1px solid #dddddd;
        position: relative;    
    }

    #batch-cont .edit-bttn{
        position: absolute;
        top: 10px;
        right: 10px;
        width: 0px;
        overflow: hidden;
        display: block;
        transition: 200ms ease all;
    }

    #batch-cont:hover .edit-bttn{
        opacity: 1;
        width: 30px;
    }

    .app-basic-info{
        /*
        margin: 2rem 2rem 0rem 2rem;
        padding: 3.5rem 0px 0 0;
        background: #fff;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
        border: 1px solid #dddddd;
        position: relative;
        */
        margin: 1rem 0rem 0rem 1rem;
        padding: 3.5rem 0px 0 0;
        background: #fff;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important;
        border: 1px solid #dddddd;
        position: relative;
    }

    #app-batch-number{
        padding: .5rem 2rem;
        position: absolute;
        background: #1679a3;
        top: 0;
        left: -1px;
        color: #fff;
    }
    .app-objt-p{
        padding: 1rem;
    }
    #app-batch-border-left{
        background: #1679a3;
        height: 100%;
        width: 9px;
        position: absolute;
        top: 0;
        right: 0;    
    }
    .app-basic-info-2{
        height: 100px;
    }

    .bar-success {  background-color: #5cb85c;}
    .bar-info {    background-color: #5bc0de;}
    .bar-warning {    background-color: #f0ad4e;}
    .bar-danger {  background-color: #d9534f;}

    /*Facebook cover photo and Profile*/

    .fb-profile-block {
    margin: auto;
    position: relative;
    /*width: 850px;*/
    /* width: 1170px; */
    }
    .fb-link-img{
        width: 100%;
        height: auto;
    }

    .fb-profile-block-thumb{
        display: block;
        /* height: 315px; */
        width:100%;
        overflow: hidden;
        position: relative;
        text-decoration: none;
    }
    .fb-profile-block-menu {
        border: 1px solid #d3d6db;
        border-radius: 0 0 3px 3px;
    }
    .profile-img a{
        bottom: 15px;
        box-shadow: none;
        display: block;
        left: 15px;
        padding:1px;
        position: absolute;
        height: 160px;
        width: 160px;
        background: rgba(210, 198, 198, 0.3) none repeat scroll 0 0;
        z-index:9;
    }
    .profile-img img {
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.07);
        padding: 5px;
    }
    .profile-name {
        bottom: 60px;
        left: 205px;
        position: absolute;
    }
    .profile-name h2 {
        color: #fff;
        font-size: 24px;
        font-weight: 600;
        line-height: 30px;
        max-width: 275px;
        position: relative;
        text-transform: capitalize;
    }
    .fb-profile-block-menu{
        height: 44px;
        position: relative;
        /*width:850px;*/
        /* width: 1170px; */
        overflow:hidden;
    }
    .block-menu {
        clear: right;
        padding-left: 205px;
    }
    .block-menu ul{
        margin:0;
        padding:0;
    }
    .block-menu ul li{
        display:inline-block;
        }
    .block-menu ul li a {
        border-right: 1px solid #e9eaed;
        float: left;
        font-size: 14px;
        font-weight: bold;
        height: 42px;
        line-height: 3.0;
        padding: 0 17px;
        position: relative;
        vertical-align: middle;
        white-space: nowrap;
        color:#4b4f56;
        text-transform:capitalize;
    }

    .block-menu ul li:first-child a{
        border-left: 1px solid #e9eaed;
    }

    .second-column-tab, .first-column-tab{
        margin-bottom: 1rem;
        background: #fff;
        border: 1px solid #dddfe2;
        box-shadow: 2px 0 #dedede;
        position: relative;
        padding-bottom: 1rem;
    }

    .first-column-tab h3 i, .second-column-tab h3 i {
        color: #4267b2;
        margin: 0 .5rem 0px 0;
    }

    .first-column-tab h3, .second-column-tab h3{
        border-bottom: 1px solid #e9ebee;
        padding: 1rem;
    }

    .first-column-tab p{
        padding: 0 1rem;
    }

    .resume-content{
        padding-left: .6rem;
    }
    .i-icon-wrapper{
        /* position: relative;
        background: rgb(31, 89, 149);
        border-radius: 12.5px; */
    }
    .i-icon-wrapper i{
        /* position: relative; */
        color: #4267b2;
        /* font-size: 1rem!important; */

    }
    .progress{
        border-radius: 0!important;
        border: 1px solid #bfbebe;
        height: 30px;    
    }
    .progress-bar{
        padding-top: 4px;
    }

    #resume_update_btn{
        position: absolute;
        top: 0;
        right: 0;
        border-radius: 0!important;
    }
    
    .pr-edit-btn{
        font-size: 1.3rem;
        color: #187aa4;
        position: absolute;
        top: 12px;
        right: 22px;
        cursor: pointer;
    }
    .second-column-tab .pr-edit-btn, .first-column-tab .pr-edit-btn,.edit-btn{
        font-size: 1.3rem;
        color: #187aa4;
        position: absolute;
        top: 12px;
        right: 22px;
        width: 0px;
        overflow: hidden;
        display: block;
        transition: 200ms ease all;
        cursor: pointer;
    }
    .second-column-tab:hover .pr-edit-btn, .first-column-tab:hover .pr-edit-btn, .first-column-tab:hover .edit-btn, .second-column-tab:hover .edit-btn{
        opacity: 1;
        width: 30px;
    }
    .swal-wide{
        width:850px !important;
    }

    .feature-box-style-gart .feature-icon-gart {
        float: left;
        width: 80px;
        height: 76px;
        padding: 2px;
        margin-right: 30px;
        /* margin-left: 13px; */
        display: inline-block;
        /* border: 2px dashed #953020; */
        background-color: #b2ceea;
    }
    .feature-box-style-gart:hover .feature-icon-gart {
        border: 2px solid #953020;
    }
    .feature-box-style-gart .feature-icon-gart i{
        color: #2793ff;
        font-size: 2rem;
        width: 73px;
        height: 66px;
        display: block;
        line-height: 73px;
        text-align: center;
        /* background-color: #ffffff; */
        -webkit-transition: all 0.1s ease-in-out;
        -moz-transition: all 0.1s ease-in-out;
        -ms-transition: all 0.1s ease-in-out;
        -o-transition: all 0.1s ease-in-out;
        transition: all 0.1s ease-in-out;    
    }


    /*Upload resume */
    .file-upload {
        display: block;
        text-align: center;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 16px;
        padding: 0 1rem;
    }

    .file-upload .file-select {
        display: block;
        border: 2px dashed #55a5f5;
        color: #34495e;
        cursor: pointer;
        height: 80px;
        line-height: 40px;
        text-align: left;
        background: #FFFFFF;
        overflow: hidden;
        position: relative;
    }

    .file-upload .file-select .file-select-button {
        background: #dce4ec;
        padding: 0 10px;
        display: inline-block;
        height: 40px;
        line-height: 40px;
    }

    .file-upload .file-select .file-select-name {
        line-height: 40px;
        display: inline-block;
        padding: 18px 11px;
    }

    .file-upload .file-select:hover {
        border-color: #34495e;
        transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
    }

    .file-upload .file-select:hover .file-select-button {
        background: #34495e;
        color: #FFFFFF;
        transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
    }

    .file-upload.active .file-select {
        border-color: #3fa46a;
        transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
    }

    .file-upload.active .file-select .file-select-button {
        background: #3fa46a;
        color: #FFFFFF;
        transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
    }
    .file-upload.active .file-select .feature-box-style-gart .feature-icon-gart i {
        color: #3fa46a;
    }

    .file-upload .file-select input[type=file] {
        z-index: 100;
        cursor: pointer;
        position: absolute;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        filter: alpha(opacity=0);
    }

    .file-upload .file-select.file-select-disabled {
        opacity: 0.65;
    }

    .file-upload .file-select.file-select-disabled:hover {
        cursor: default;
        display: block;
        border: 2px solid #dce4ec;
        color: #34495e;
        cursor: pointer;
        height: 40px;
        line-height: 40px;
        margin-top: 5px;
        text-align: left;
        background: #FFFFFF;
        overflow: hidden;
        position: relative;
    }

    .file-upload .file-select.file-select-disabled:hover .file-select-button {
        background: #dce4ec;
        color: #666666;
        padding: 0 10px;
        display: inline-block;
        height: 40px;
        line-height: 40px;
    }

    .file-upload .file-select.file-select-disabled:hover .file-select-name {
        line-height: 40px;
        display: inline-block;
        padding: 0 10px;
    }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{
        color: #fff;
        cursor: default;
        background-color: #337ab7;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
</style>
<link href="{{ asset('css/components/info-tip.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/croppie.css')}}">
<link href="{{ asset('css/components/image-cropper-component.css') }}" rel="stylesheet">
@endsection

@section('content')
@include('includes.image-cropper')
<div class="container">

    <!-- Cover photo here -->
    <div class="fb-profile-block">
          <div class="fb-profile-block-thumb" style="background:#dedede;">
                <div class="crop-control" style="border-bottom-right-radius:0px; border-bottom-left-radius:0px; height: 100%;" data-width="1200" data-height="400" data-dim="true">
                    <div class="image-container-cover" style="height: 100%;">
                        <img style="width: 100%;" id="cover-image" src="{{ \Auth::user()->cover_image }}" alt="{{ \Auth::user()->name}} Cover photo" />
                        <div style="background: linear-gradient(transparent,rgba(0, 0, 0, 0.71));position: absolute;width: 100%;height: 70px;bottom: 0px;"></div>
                        <label for="cover_image" class="input-trigger hover-div" style="width: initial;
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
                        <input type="file" id="cover_image" name="cover_image" accept="image/*" />
                    </div>
                </div>
          </div>
            <div class="profile-img">
                <!-- <a href="#">
                        @if(!empty($resume->photo))
                            <img class="fb-link-img" id="update-profile-pic" src="{{$resume->photo}}" alt="{{$resume->f_name}}" title="{{$resume->f_name}}" />
                        @else
                            <img class="fb-link-img" src="http://santetotal.com/wp-content/uploads/2014/05/default-user.png" alt="" title="">
                        @endif
                </a> -->
                <div class="crop-control" style="height: 170px; width: 170px; position:absolute; bottom:10px; left:10px; z-index:1;">
                    <div class="image-container" style="height: 100%;">
                        <img id="profile-picture" src="{{$resume->photo}}" style="width:100%;">
                        <label for="photo" class="input-trigger hover-div" style="width: initial;
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
                    <div class="input-container" id="photo-container">
                        <input type="file" id="photo" name="photo" accept="image/*" />
                    </div>
                </div>
            </div>
          <div class="profile-name">
            <h2>{{$resume->f_name}} {{$resume->m_name}} {{$resume->l_name}}</h2>
          </div>
          <div class="fb-profile-block-menu">
               <div class="block-menu" style="background: #fff">
                    <ul class="nav nav-tabs" style="background: #fff">
                       <li class="active">
                            <a data-toggle="tab" href="#home">
                                    <i class="fa fa-th-list"></i>
                                    <span id="resume-tab-itp">Resume</span>
                            </a>
                        </li>

                        <li>
                           <a data-toggle="tab" href="#application1">
                                <i class="fa fa-suitcase"></i>                               
                                <span id="application-tab-itp">Application</span>
                           </a>
                        </li>

                    </ul>
               </div>
          </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#profile-picture').on('load',function(){
                //  
                if($(this).prop('need-save'))
                {
                    swal({
                        title: 'Saving',
                        text: 'Please wait...',
                        onOpen: () => {
                            swal.showLoading()
                        },
                        allowOutsideClick: () => !swal.isLoading()
                    })
                    $.ajax({
                        url:"{{route('j_e_r_p_photo')}}",
                        type:'PATCH',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        data:{'photo':$(this).prop('src'),resume_id:{{$resume->id}}},
                        success:function(data){
                            swal({
                                title: 'All done!',
                                type:'success',
                                html:
                                    '',
                                confirmButtonText: 'Ok'
                            })
                        }
                    });
                }
            });

            $('#cover-image').on('load',function(){
                //  
                if($(this).prop('need-save'))
                {
                    swal({
                        title: 'Saving',
                        text: 'Please wait...',
                        onOpen: () => {
                            swal.showLoading()
                        },
                        allowOutsideClick: () => !swal.isLoading()
                    })
                    $.ajax({
                        url:"{{route('j_e_r_p_cover')}}",
                        type:'PATCH',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        data:{'photo':$(this).prop('src')},
                        success:function(data){
                            swal({
                                title: 'All done!',
                                type:'success',
                                html:
                                    '',
                                confirmButtonText: 'Ok'
                            })
                        }
                    });
                }
            });
        });
    </script>
    <div class="tab-content">

        <div class="tab-pane fade in active" id="home">
            <br />
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    @if(\Auth::user()->profileProgress() < 100)
                    <h5>Profile progress:</h5>
                    <div class="progress progress-navbar">
                        <div class="progress-bar progress-bar-striped active profile-progress" role="progressbar" style="width: {{\Auth::user()->profileProgress()}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="val">{{\Auth::user()->profileProgress()}}</span>% profile complete</div>
                    </div>
                    @endif
                    <div>
                        <a href="{{ route('resume_edit', $resume->id) }}" class="btn btn-primary">Update Profile Using Wizard</a>
                    </div>
                    <br>
                    <div style="position:relative;">
                        <?php
                        $missing_basic_info = [];
                        if(!$resume->m_name)
                            array_push($missing_basic_info,'middle name is missing');
                        if(!$resume->phone_number)
                            array_push($missing_basic_info,'phone number is missing');
                        if(!$resume->birth_date)
                            array_push($missing_basic_info,'birth date is missing');
                        if(!$resume->address1)
                            array_push($missing_basic_info,'address is missing');
                        ?>
                        @if(count($missing_basic_info))
                        <div class="info-tip bounceIn warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    @foreach($missing_basic_info as $info)
                                        <div>{{$info}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="first-column-tab">
                            <h3>
                                <i class="fa fa-globe"></i>
                                Basic info
                            </h3>
                            <span class="pr-edit-btn" id="basic-info">
                                    <i class="fa fa-edit"></i>
                            </span>
                            
                            <p>
                                <span class="i-icon-wrapper">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </span>
                                <span class="resume-content">
                                    <a href="mailto:{{$resume->email}}" class="email" target="_blank">
                                        {{$resume->email}}
                                    </a>
                                </span>
                            </p>

                            <p>
                                <span class="i-icon-wrapper">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                </span>
                                <span class="resume-content phone_number">
                                    {{$resume->phone_number}}
                                </span>
                            </p>
                            <p>
                                <span class="i-icon-wrapper">
                                    <i class="fa fa-birthday-cake"></i>
                                </span>
                                <span class="resume-content formated_birthdate">
                                    {{$resume->formated_birthdate}}
                                </span>
                            </p>

                            <p>
                                <span class="i-icon-wrapper">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </span>
                                <span class="resume-content address1">
                                    {{$resume->address1}}
                                    {{$resume->address2}}
                                    {{$resume->city}}
                                    {{$resume->country}}
                                    {{$resume->postal}}
                                </span>
                            </p>
                            <p style="padding-bottom: 1rem;">
                                <span class="i-icon-wrapper">
                                    <i class="fa fa-language"></i>
                                </span>
                                <span class="resume-content spoken_language">
                                    {{$resume->spoken_language}}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div style="position:relative;">
                        @if(!count($resume->educations))
                        <div class="info-tip bounceIn warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    Educational background is missing
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="first-column-tab">
                            <h3>
                                <i class="fa fa-graduation-cap"></i>
                                Education
                            </h3>

                            <span class="edit-btn" id="add-education">
                                    <i class="fa fa-plus"></i>
                            </span>
                            
                            <ul class="list-group list-group-flush" id="educational-backgrounds">
                                @foreach($resume->educations as $education)
                                <li class="list-group-item">
                                    <span id="education-{{$education->id}}">{{$education->ed_university}}</span>
                                    <div class="pull-right edit-btn" id="edit-education" data-id="{{$education->id}}" style="`:pointer;">
                                        <i class="fa fa-edit"></i>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>

                    <div class="first-column-tab">
                        <h3>
                            <i class="fa fa-cloud-download"></i>
                            Uploaded compiled resume
                        </h3>
                        <div class="file-upload">
                            <div class="file-select">
                                <div class="feature-box-style-gart" style="cursor: pointer;">
                                    <div class="feature-icon-gart" style="background-color:{{$resume->resumeFileExist() ? '#b2eabd' : '#b2ceea'}}">
                                        <i class="fa {{$resume->resumeFileExist() ? 'fa-check-circle' : 'fa-plus'}}" style="color:{{$resume->resumeFileExist() ? 'white' : '#2793ff'}}"></i>
                                    </div>
                                </div>

                              <div class="file-select-name" id="noFile">{{$resume->resumeFileExist() ? 'Update Resume Document' : 'Upload Resume Document'}}</div>
                              <div style="position:absolute; top:0px; left:0px; right:0px; bottom:0px;" id="choose_resume_file_bttn">
                              </div>
                              
                              <form id="resume-file-form">
                                    <input type="file" style="display:none;" name="resume_file" id="chooseFile">
                                    {{-- <input type="file" name="resume_file"> --}}
                                    <input type="hidden" value="{{$resume->id}}">
                                </form>
                            </div>
                        </div>
                    </div>
            </div> <!--End of Col-md-->

                {{-- @if(isset($application)) --}}
                <div class="col-lg-7 col-md-7">
                    <div style="position:relative;">
                        @if(!count($resume->skills))
                        <div class="info-tip bounceIn tip-right warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    Featured skills are missing
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="second-column-tab">
                                <h3>
                                    <i class="fa fa-code"></i>
                                    Featured Skills
                                </h3>
                                    <div class="row" id="skill_required" style="margin: .5rem;">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                <span class="pr-edit-btn" id="add-skill">
                                        <i class="fa fa-plus"></i>
                                </span>
                        </div>
                    </div>
                    <div style="position:relative;">
                        @if(!count($resume->experiences))
                        <div class="info-tip bounceIn tip-right warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    Experience information is missing
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="second-column-tab">

                                <h3>
                                    <i class="fa fa-star"></i>
                                    Experiences
                                </h3>

                                <span class="edit-btn" id="add-experiences">
                                        <i class="fa fa-plus"></i>
                                </span>

                                <ul class="list-group list-group-flush" id="work-experiences">
                                    @foreach($resume->experiences as $experience)
                                    <li class="list-group-item">
                                        <span id="experience-{{$experience->id}}">{{$experience->ex_company}}</span>
                                        <div class="pull-right edit-btn" id="edit-experience" data-id="{{$experience->id}}" style="cursor:pointer;">
                                            <i class="fa fa-edit"></i>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                        </div>
                    </div>
                    <div style="position:relative;">
                        @if(!$resume->awards)
                        <div class="info-tip bounceIn tip-right warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    Awards/Certificate information is missing
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="second-column-tab">
                            <h3>
                                <i class="fa fa-trophy"></i>
                                Awards/Certificate
                            </h3>
                            <span class="pr-edit-btn" id="edit-awards-cert">
                                    <i class="fa fa-edit"></i>
                            </span>
                            <p style="padding: 1rem;" id="awards-cert">
                                {{ $resume->awards }}
                            </p>
                        </div>
                    </div>
                    <div style="position:relative;">
                        @if(!$resume->websites)
                        <div class="info-tip bounceIn tip-right warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    Portfolio information is missing
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="second-column-tab">
                            <h3>
                                <i class="fa fa-briefcase"></i>
                                Portfolio Websites
                            </h3>
                            <span class="pr-edit-btn" id="edit-portfolio">
                                    <i class="fa fa-edit"></i>
                            </span>
                            <p style="padding: 1rem;" id="portfolio">
                                {{ $resume->websites }}
                            </p>
                        </div>
                    </div>
                    <div style="position:relative;">
                        @if(!$resume->objective)
                        <div class="info-tip bounceIn tip-right warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    Objective is missing
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="second-column-tab">
                            <div>
                                <h3>
                                    <i class="fa fa-address-card"></i>                                    
                                    Objective
                                </h3>
                                <span class="pr-edit-btn" id="edit-objective">
                                        <i class="fa fa-edit"></i>
                                </span>                            
                                <p style="padding: 1rem;" id="objective">
                                    {{$resume->objective}}                                
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="position:relative;">
                        @if(!$resume->other_skills)
                        <div class="info-tip bounceIn tip-right warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    Other skills information is missing
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="second-column-tab">
                            <div>
                                <h3>
                                    <i class="fa fa-asterisk"></i>
                                    Other Skills
                                </h3>
                                <span class="pr-edit-btn" id="edit-other_skills">
                                        <i class="fa fa-edit"></i>
                                </span>                                
                                <p style="padding: 1rem;" id="other_skills">
                                    {{$resume->other_skills}}                                
                                </p>
                            </div>
                        </div>
                    </div>
                    <div style="position:relative;">
                        @if(!$resume->seminars_attended)
                        <div class="info-tip bounceIn tip-right warning-tip">
                            <div class="body">
                                <div class="header">
                                    Information Incomplete
                                    <span class="info-close"></span>
                                </div>
                                <div class="text">
                                    Seminars attended information missing
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="second-column-tab">
                            <div>
                                <h3>
                                    <i class="fa fa-plus-circle"></i>
                                    Seminars Attended
                                </h3>
                                <span class="pr-edit-btn" id="edit-seminars_attended">
                                        <i class="fa fa-edit"></i>
                                </span>                            
                                <p style="padding: 1rem;" id="seminars_attended">
                                    {{$resume->seminars_attended}}                                
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>

        <div class="tab-pane fade" id="application1">
            <br>
            <a href="{{route('itp_create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Application</a>
            <br>
            <br>
            <div class="row">
                <?php $apps = 0; ?>
                @foreach($applications as $application)
                    @if($application->trainingBatch)
                    <?php $apps++; ?>
                    <div class="col-lg-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ $application->trainingBatch->name }}</div>
                            <div class="panel-body">
                                <b> Training Date : </b> {{ $application->trainingBatch->startdate }}
                                <br>
                                <b> Status : </b>
                                <?php
                                    switch ($application->status) {
                                        case 'under_review':
                                            echo '<span class="label label-primary">Under Review</span>';
                                            break;
                                        case 'approved':
                                            echo '<span class="label label-success">Approved</span>';
                                            break;
                                        case 'declined':
                                            echo '<span class="label label-default">Declined</span>';
                                            break;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @if($apps < 1)
                <div class="col-lg-4 col-sm-6">
                    <div class="alert alert-info" role="alert">
                        <strong>You don't have application yet.</strong>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="first-column-tab" style="padding:15px;margin-top: 1rem;">
        <h5>Application History</h5>
        <table class="table table-bordered" id="applications-table" style="width: 100%;">
            <thead>
                <tr>
                    <th>Training Batch</th>
                    <th>Training Start Date</th>
                    <th>Submitted Date</th>
                    <th>Options</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="ui mini modal" id="delete_application">
    <div class="header">Delete Batch</div>
    <div class="content">
        <p>Are you sure you want to delete this batch?</p>
    </div>
    <div class="actions">
        <div class="ui negative button">
            No
        </div>
        <div class="ui delete positive right labeled icon button">
            Yes
            <i class="checkmark icon"></i>
        </div>
    </div>
</div>

<div class="ui modal" id="edit_education_modal">
    <div class="header">
        Educational Background
    </div>
    <div class="content">
        <form action="{{route('j_create_update_ed')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="resume_id" value="{{\Auth::user()->findFirstOrCreateResume()->id}}">
            <input type="hidden" name="id" value="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="ed_university" class="required-label">University</label>
                        <input class="form-control" name="ed_university" type="text" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="ed_field_of_study" class="required-label">Field of study</label>
                        <input class="form-control" name="ed_field_of_study" type="text" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="ed_program_of_study" class="required-label">Program of study</label>
                        <input class="form-control" name="ed_program_of_study" type="text" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required start_end_date_range">
                        <label for="duration" class="required-label">Duration</label><br>
                        {!!Form::select("ed_from_month", month_array(), null, ['class' => 'from_month ed_from_month ui dropdown single-select parent-form-group'])!!},
                        {!!Form::select("ed_from_year", year_array(), null, ['class' => 'from_year ed_from_year ui dropdown single-select parent-form-group'])!!}
                        &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                        {!!Form::select("ed_to_month", month_array(), null, ['class' => 'to_month ed_to_month ui dropdown single-select parent-form-group'])!!},
                        {!!Form::select("ed_to_year", year_array(), null, ['class' => 'to_year ed_to_year ui dropdown single-select parent-form-group'])!!}
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
      <div class="ui button deny">Cancel</div>
      <div class="ui green button" onclick="$('#edit_education_modal form').submit();">Save</div>
    </div>
</div>

<div class="ui modal" id="edit_experience_modal">
    <div class="header">
        Experience
    </div>
    <div class="content">
        <form action="{{route('j_create_update_experience')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="resume_id" value="{{\Auth::user()->findFirstOrCreateResume()->id}}">
            <input type="hidden" name="id" value="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="ex_company" class="required-label">Company</label>
                        <input class="form-control" name="ex_company" type="text" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="ex_postion" class="required-label">Position</label>
                        <input class="form-control" name="ex_postion" type="text" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required start_end_date_range">
                        <label for="duration" class="required-label">Duration</label><br>
                        {!!Form::select("ex_from_month", month_array(), null, ['class' => 'ex_from_month from_month ui dropdown single-select parent-form-group'])!!},
                        {!!Form::select("ex_from_year", year_array(), null, ['class' => 'ex_from_year from_year ui dropdown single-select parent-form-group'])!!}
                        &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                        {!!Form::select("ex_to_month", month_array(), null, ['class' => 'ex_to_month to_month ui dropdown single-select parent-form-group'])!!},
                        {!!Form::select("ex_to_year", year_array(), null, ['class' => 'ex_to_year to_year ui dropdown single-select parent-form-group'])!!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group required">
                        <label for="ex_explanation" class="required-label">Responsibilities</label>
                        <textarea class="form-control" name="ex_explanation" cols="50" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="actions">
      <div class="ui button deny">Cancel</div>
      <div class="ui green button" onclick="$('#edit_experience_modal form').submit();">Save</div>
    </div>
</div>

<script>

    function addEducationalBackground(data){
        var html = '<li class="list-group-item">'
                    +'    <span id="education-'+data.id+'">'+data.ed_university+'</span>'
                    +'    <div class="pull-right edit-btn" id="edit-education" data-id="'+data.id+'" style="cursor:pointer;">'
                    // +'    <div class="pull-right pr-edit-btn" id="edit-education" data-id="'+data.id+'" style="cursor:pointer;">'
                    +'        <i class="fa fa-edit"></i>'
                    +'    </div>'
                    +'</li>'
        $('#educational-backgrounds').append(html);
    }
    
    function addWorkExperience(data){
        
        var html = '<li class="list-group-item">'
                    +'    <span id="experience-'+data.id+'">'+data.ex_company+'</span>'
                    +'    <div class="pull-right edit-btn" id="edit-experience" data-id="'+data.id+'" style="cursor:pointer;">'
                    +'        <i class="fa fa-edit"></i>'
                    +'    </div>'
                    +'</li>'
        $('#work-experiences').append(html);
    }

    $(document).ready(function(){
        $('#edit_education_modal form').unickForm(
            {
                validations : { // initialize the plugin
                    ed_university : {
                        type:'empty',
                        prompt:'Please enter your first name'
                    },
                    ed_field_of_study : {
                        type:'empty',
                        prompt:'Please enter your first name'
                    },
                    ed_program_of_study : {
                        type:'empty',
                        prompt:'Please enter your first name'
                    },
                    start_end_date_range : {
                        type:'start_end_date_range',
                    }
                }
            },
            function(data){
                if(!$('#edit_education_modal [name=id]').val())
                {
                    addEducationalBackground(data.education);
                }
                else
                {
                    $('#education-'+data.education.id).html(data.education.ed_university);
                }
                setEditEdBtn($('#educational-backgrounds .list-group-item:last-child').find('.edit-btn'))
                $('#edit_education_modal').modal('hide');
            }
        );

        $('#edit_experience_modal form').unickForm(
            {
                validations : { // initialize the plugin
                    ex_company : {
                        type:'empty',
                        prompt:'Please enter Company Name'
                    },
                    ex_postion : {
                        type:'empty',
                        prompt:'Please enter Position or Role'
                    },
                    ex_explanation : {
                        type:'empty',
                        prompt:'Please enter your Responsibility'
                    },
                    start_end_date_range : {
                        type:'start_end_date_range',
                    }
                }
            },
            function(data){
                if(!$('#edit_experience_modal [name=id]').val())
                {
                    addWorkExperience(data.experience);
                }
                else
                {
                    $('#experience-'+data.experience.id).html(data.experience.ex_company);
                }
                setEditExBtn($('#work-experiences .list-group-item:last-child').find('.edit-btn'))
                $('#edit_experience_modal').modal('hide');
            }
        );
    });

    $('#add-education').click(function(){
        showCreateEd();
    });

    $('#add-experiences').click(function(){
        showCreateEx();
    });

    function setEditEdBtn(elm){
        elm.click(function(){
            var ed_id = $(this).data('id');
            swal({
                title: 'Action',
                text: 'What action do you wanna perform?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Update',
                cancelButtonText: 'Delete'
            }).then((result)=>{
                if (result.value) {
                    swal({
                        title: 'Loading Info',
                        text: 'Please wait...',
                        onOpen: () => {
                            swal.showLoading()
                        },
                        allowOutsideClick: () => !swal.isLoading()
                    })
                    $.ajax({
                        'url':"{{route('j_g_r_education')}}",
                        type:"GET",
                        data:{id:ed_id},
                        success:function(_data){
                            swal.close();
                            $('#edit_education_modal').find('[name=id]').val(ed_id);
                            $('#edit_education_modal [name=ed_university]').val(_data.ed_university);
                            $('#edit_education_modal [name=ed_program_of_study]').val(_data.ed_program_of_study);
                            $('#edit_education_modal [name=ed_field_of_study]').val(_data.ed_field_of_study);
                            $('#edit_education_modal [name=ed_from_year]').val(_data.ed_from_year).change();
                            $('#edit_education_modal [name=ed_from_month]').val(_data.ed_from_month).change();
                            $('#edit_education_modal [name=ed_to_year]').val(_data.ed_to_year).change();
                            $('#edit_education_modal [name=ed_to_month]').val(_data.ed_to_month).change();
                            $('#edit_education_modal [name=resume_id]').val(_data.resume_id);
                            $('#edit_education_modal').modal('show');
                        }
                    });
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            swal({
                                title: 'Updating database',
                                text: 'Please wait...',
                                onOpen: () => {
                                    swal.showLoading()
                                },
                                allowOutsideClick: () => !swal.isLoading()
                            })

                            $.ajax({
                                url:"{{route('j_d_education')}}",
                                type:"delete",
                                data:{id:ed_id},
                                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                success:function(data){
                                    swal(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(()=>{
                                        $('#education-'+ed_id).closest('.list-group-item').remove();
                                    });
                                }
                            });
                        }
                    })
                }
            });
            
        });
    }

    function showCreateEd(){
        $('#edit_education_modal').find('input').val('');
        $('#edit_education_modal').find('[name=resume_id]').val('{{\Auth::user()->findFirstOrCreateResume()->id}}');
        $('#edit_education_modal').find('select').dropdown('clear');
        $('#edit_education_modal').modal('show');
    }

    function setEditExBtn(elm){
        elm.click(function(){
            var _id = $(this).data('id');
            swal({
                title: 'Action',
                text: 'What action do you wanna perform?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Update',
                cancelButtonText: 'Delete'
            }).then((result)=>{
                if (result.value) {
                    swal({
                        title: 'Loading Info',
                        text: 'Please wait...',
                        onOpen: () => {
                            swal.showLoading()
                        },
                        allowOutsideClick: () => !swal.isLoading()
                    })
                    $.ajax({
                        'url':"{{route('j_g_experience')}}",
                        type:"GET",
                        data:{id:_id},
                        success:function(_data){
                            swal.close();
                            $('#edit_experience_modal').find('[name=id]').val(_id);
                            $('#edit_experience_modal [name=ex_company]').val(_data.ex_company);
                            $('#edit_experience_modal [name=ex_postion]').val(_data.ex_postion);
                            $('#edit_experience_modal [name=ex_explanation]').val(_data.ex_explanation);
                            $('#edit_experience_modal [name=ex_from_year]').val(_data.ex_from_year).change();
                            $('#edit_experience_modal [name=ex_from_month]').val(_data.ex_from_month).change();
                            $('#edit_experience_modal [name=ex_to_year]').val(_data.ex_to_year).change();
                            $('#edit_experience_modal [name=ex_to_month]').val(_data.ex_to_month).change();
                            $('#edit_experience_modal [name=resume_id]').val(_data.resume_id);
                            $('#edit_experience_modal').modal('show');
                        }
                    });
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            swal({
                                title: 'Updating database',
                                text: 'Please wait...',
                                onOpen: () => {
                                    swal.showLoading()
                                },
                                allowOutsideClick: () => !swal.isLoading()
                            })

                            $.ajax({
                                url:"{{route('j_d_experience')}}",
                                type:"delete",
                                data:{id:_id},
                                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                success:function(data){
                                    swal(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    ).then(()=>{
                                        $('#experience-'+_id).closest('.list-group-item').remove();
                                    });
                                }
                            });
                        }
                    })
                }
            });
            
        });
    }

    function showCreateEx(){
        $('#edit_experience_modal').find('input,textarea').val('');
        $('#edit_experience_modal').find('[name=resume_id]').val('{{\Auth::user()->findFirstOrCreateResume()->id}}');
        $('#edit_experience_modal').find('select').dropdown('clear');
        $('#edit_experience_modal').modal('show');
    }

    setEditEdBtn($('#educational-backgrounds .edit-btn'));
    setEditExBtn($('#work-experiences .edit-btn'));
</script>

<script>
$(document).ready(function(){
    var editor = $('#home').profileEditor({
        'editHandlers':{
            'basic-info':function(obj){
                swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })
                $.ajax({
                    'url':"{{route('json_get_resume')}}",
                    type:'GET',
                    data:{},
                    success:function(resume){
                        // 
                        obj.resume = resume;
                        swal(
                            'Update Basic Info?',
                            'Click OK',
                            'question').then((result) => {
                                if(result.value)
                                {
                                    swal.setDefaults({
                                        input: 'text',
                                        confirmButtonText: 'Next &rarr;',
                                        showCancelButton: true,
                                        progressSteps: ['1', '2', '3', '4', '5', '6', '7', '8'],
                                        customClass: 'swal-wide',
                                    })

                                    var steps = [
                                        {
                                            title: 'First Name',
                                            preConfirm: swalRequired,
                                            inputValue: obj.resume.f_name,
                                        },
                                        {
                                            
                                            title: 'Middle Name',
                                            inputValue: obj.resume.m_name,
                                        },
                                        {
                                            title: 'Last Name',
                                            preConfirm: swalRequired,
                                            inputValue: obj.resume.l_name,
                                        },
                                        {
                                            title: 'Email',
                                            input: 'email',
                                            inputValue: obj.resume.email,
                                        },
                                        {
                                            title: 'Phone Number',
                                            preConfirm: swalRequired,
                                            inputValue: obj.resume.phone_number,
                                            onOpen: function() {
                                                $('.swal2-modal .swal2-input').prop('type','number').css('max-width','initial');
                                            },
                                        },
                                        {
                                            title: 'Birthdate',
                                            className: "red-bg",
                                            inputValue: obj.resume.birth_date.split(' ')[0],
                                            preConfirm: swalRequired,
                                            onOpen: function() {
                                                $('.swal2-modal .swal2-input').prop('type','date');
                                            },
                                        },
                                        {
                                            title: 'Address',
                                            preConfirm: swalRequired,
                                            inputValue: obj.resume.address1,
                                        },
                                        {
                                            title: 'Spoken Languages',
                                            showLoaderOnConfirm: true,
                                            inputValue: obj.resume.spoken_language,
                                            preConfirm: swalRequired,
                                            allowOutsideClick: () => !swal.isLoading(),
                                            preConfirm: swalRequired,
                                        },
                                    ]

                                    swal.queue(steps).then((result) => {
                                    swal.resetDefaults()

                                    if (result.value) {
                                        var data = {
                                            f_name:result.value[0],
                                            m_name:result.value[1],
                                            l_name:result.value[2],
                                            email:result.value[3],
                                            phone_number:result.value[4],
                                            birth_date:result.value[5],
                                            address1:result.value[6],
                                            spoken_language:result.value[7],
                                            _method: "PATCH"
                                        };
                                        swal({
                                            title: 'Saving',
                                            text: 'Please wait...',
                                            onOpen: () => {
                                                swal.showLoading()
                                            },
                                            allowOutsideClick: () => !swal.isLoading()
                                        })
                                        $.ajax({
                                            url:"{{route('j_e_r_p_basic')}}",
                                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                            type: 'PATCH',
                                            data:data,
                                            success:function(_data){
                                                // 
                                                console.log(obj.current_panel)
                                                fillInfos($('#'+obj.current_panel).closest('.first-column-tab'),data)
                                                swal({
                                                    title: 'All done!',
                                                    html:
                                                        '',
                                                    confirmButtonText: 'Ok',
                                                    type:'success'
                                                })
                                            }
                                        });
                                    }
                                    })
                                }
                        });
                    }
                });
            },
            // 'add-education':function(obj){
            //     swal(
            //         'Add Education Background?',
            //         'Click OK',
            //         'question').then((result) => {
            //             if(result.value)
            //             {
            //                 swal.setDefaults({
            //                     input: 'text',
            //                     confirmButtonText: 'Next &rarr;',
            //                     showCancelButton: true,
            //                     progressSteps: ['1', '2', '3', '4', '5', '6', '7'],
            //                     customClass: 'swal-wide',
            //                 })

            //                 var steps = [
            //                     {
            //                         title: 'University',
            //                         preConfirm: swalRequired,
            //                     },
            //                     {
                                    
            //                         title: 'Field of study',
            //                         preConfirm: swalRequired,
            //                     },
            //                     {
            //                         title: 'Program of study',
            //                         preConfirm: swalRequired,
            //                     },
            //                     {
            //                         title: 'Montn',
            //                         text: 'Month you started studying',
            //                         input: 'select',
            //                         inputOptions: {
            //                             @foreach(month_array() as $key => $value)
            //                             '{{$key}}':'{{$value}}',
            //                             @endforeach
            //                         },
            //                         preConfirm: swalRequired
            //                     },
            //                     {
            //                         title: 'Year',
            //                         text: 'Year you started studying',
            //                         input: 'select',
            //                         inputOptions: {
            //                             @foreach(year_array() as $key => $value)
            //                             '{{$key}}':'{{$value}}',
            //                             @endforeach
            //                         },
            //                         preConfirm: swalRequired
            //                     },
            //                     {
            //                         title: 'Montn',
            //                         text: 'Month ended',
            //                         input: 'select',
            //                         inputOptions: {
            //                             @foreach(month_array() as $key => $value)
            //                             '{{$key}}':'{{$value}}',
            //                             @endforeach
            //                         },
            //                         preConfirm: swalRequired
            //                     },
            //                     {
            //                         title: 'Year',
            //                         text: 'Year ended',
            //                         input: 'select',
            //                         inputOptions: {
            //                             @foreach(year_array() as $key => $value)
            //                             '{{$key}}':'{{$value}}',
            //                             @endforeach
            //                         },
            //                         preConfirm: swalRequired
            //                     },
            //                 ]

            //                 swal.queue(steps).then((result) => {
            //                 swal.resetDefaults()

            //                 if (result.value) {
            //                     var data = {
            //                         ed_university:result.value[0],
            //                         ed_program_of_study:result.value[1],
            //                         ed_field_of_study:result.value[2],
            //                         ed_from_month:result.value[3],
            //                         ed_from_year:result.value[4],
            //                         ed_to_month:result.value[5],
            //                         ed_to_year:result.value[6],
            //                         resume_id:{{$resume->id}},
            //                         _method: "PATCH"
            //                     };
            //                     swal({
            //                         title: 'Saving',
            //                         text: 'Please wait...',
            //                         onOpen: () => {
            //                             swal.showLoading()
            //                         },
            //                         allowOutsideClick: () => !swal.isLoading()
            //                     })
            //                     $.ajax({
            //                         url:"{{route('j_c_r_p_educational_background')}}",
            //                         headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            //                         type: 'PATCH',
            //                         data:data,
            //                         success:function(_data){
            //                             // 
            //                             addEducationalBackground(_data.education);
            //                             obj.setEditButtonEdit($('#educational-backgrounds .list-group-item:last-child').find('.pr-edit-btn'))
            //                             swal({
            //                                 title: 'All done!',
            //                                 html:
            //                                     '',
            //                                 confirmButtonText: 'Ok',
            //                                 type:'success'
            //                             })
            //                         }
            //                     });
            //                 }
            //                 })
            //             }
            //     });
            // },
            'edit-education':function(obj){
                swal({
                    title: 'Action',
                    text: 'What action do you wanna perform?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Update',
                    cancelButtonText: 'Delete'
                }).then((result)=>{
                    if (result.value) {
                        swal({
                            title: 'Loading Info',
                            text: 'Please wait...',
                            onOpen: () => {
                                swal.showLoading()
                            },
                            allowOutsideClick: () => !swal.isLoading()
                        })
                        $.ajax({
                            'url':"{{route('j_g_r_education')}}",
                            type:"GET",
                            data:{id:obj.id},
                            success:function(_data){
                                swal(
                                    'Edit Education Background?',
                                    'Click OK',
                                    'question').then((result) => {
                                        if(result.value)
                                        {
                                            swal.setDefaults({
                                                input: 'text',
                                                confirmButtonText: 'Next &rarr;',
                                                showCancelButton: true,
                                                progressSteps: ['1', '2', '3', '4', '5', '6', '7'],
                                                customClass: 'swal-wide',
                                            })

                                            var steps = [
                                                {
                                                    title: 'University',
                                                    preConfirm: swalRequired,
                                                    inputValue: _data.ed_university,
                                                },
                                                {
                                                    
                                                    title: 'Field of study',
                                                    inputValue: _data.ed_field_of_study,
                                                    preConfirm: swalRequired,
                                                },
                                                {
                                                    title: 'Program of study',
                                                    preConfirm: swalRequired,
                                                    inputValue: _data.ed_program_of_study,
                                                },
                                                {
                                                    title: 'Month',
                                                    text: 'Month you started studying',
                                                    input: 'select',
                                                    inputValue: _data.ed_from_month,
                                                    inputOptions: {
                                                        @foreach(month_array() as $key => $value)
                                                        '{{$key}}':'{{$value}}',
                                                        @endforeach
                                                    },
                                                    preConfirm: swalRequired
                                                },
                                                {
                                                    title: 'Year',
                                                    text: 'Year you started studying',
                                                    input: 'select',
                                                    inputValue: _data.ed_from_year,
                                                    inputOptions: {
                                                        @foreach(year_array() as $key => $value)
                                                        '{{$key}}':'{{$value}}',
                                                        @endforeach
                                                    },
                                                    preConfirm: swalRequired
                                                },
                                                {
                                                    title: 'Month',
                                                    text: 'Month ended',
                                                    input: 'select',
                                                    inputValue: _data.ed_to_month,
                                                    inputOptions: {
                                                        @foreach(month_array() as $key => $value)
                                                        '{{$key}}':'{{$value}}',
                                                        @endforeach
                                                    },
                                                    preConfirm: swalRequired
                                                },
                                                {
                                                    title: 'Year',
                                                    text: 'Year ended',
                                                    input: 'select',
                                                    inputValue: _data.ed_to_year,
                                                    inputOptions: {
                                                        @foreach(year_array() as $key => $value)
                                                        '{{$key}}':'{{$value}}',
                                                        @endforeach
                                                    },
                                                    preConfirm: swalRequired
                                                },
                                            ]

                                            swal.queue(steps).then((result) => {
                                            swal.resetDefaults()

                                            if (result.value) {
                                                var __data = {
                                                    id:_data.id,
                                                    ed_university:result.value[0],
                                                    ed_program_of_study:result.value[1],
                                                    ed_field_of_study:result.value[2],
                                                    ed_from_month:result.value[3],
                                                    ed_from_year:result.value[4],
                                                    ed_to_month:result.value[5],
                                                    ed_to_year:result.value[6],
                                                    resume_id:{{$resume->id}},
                                                    _method: "PATCH"
                                                };
                                                swal({
                                                    title: 'Saving',
                                                    text: 'Please wait...',
                                                    onOpen: () => {
                                                        swal.showLoading()
                                                    },
                                                    allowOutsideClick: () => !swal.isLoading()
                                                })
                                                $.ajax({
                                                    url:"{{route('j_e_r_p_educational_background')}}",
                                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                                    type: 'PATCH',
                                                    data:__data,
                                                    success:function(data){
                                                        // 
                                                        console.log(obj.current_panel)
                                                        console.log($('#education-'+_data.id));
                                                        $('#education-'+_data.id).html(__data.ed_university);
                                                        swal({
                                                            title: 'All done!',
                                                            type:'success',
                                                            html:
                                                                '',
                                                            confirmButtonText: 'Ok'
                                                        })
                                                    }
                                                });
                                            }
                                            })
                                        }
                                });
                            }
                        });
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        swal({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.value) {
                                swal({
                                    title: 'Updating database',
                                    text: 'Please wait...',
                                    onOpen: () => {
                                        swal.showLoading()
                                    },
                                    allowOutsideClick: () => !swal.isLoading()
                                })

                                $.ajax({
                                    url:"{{route('j_d_education')}}",
                                    type:"delete",
                                    data:{id:obj.id},
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    success:function(data){
                                        swal(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        ).then(()=>{
                                            $('#education-'+obj.id).closest('.list-group-item').remove();
                                        });
                                    }
                                });
                            }
                        })
                    }
                });
            },
            'add-skill':function(obj){
                swal({
                    title: 'Select Language/Technology',
                    html:'<select id="swal-language-select" class="ui fluid normal dropdown">'
                        +'            <option value="">Select</option>'
                        +'            <option value="PHP">PHP</option>'
                        +'            <option value="Ruby">Ruby</option>'
                        +'            <option value="Java">Java</option>'
                        +'            <option value="C++">C++</option>'
                        +'            <option value="Python">Python</option>'
                        +'            <option value="Swift">Swift</option>'
                        +'            <option value="Go">Go</option>'
                        +'            <option value="C#">C#</option>'
                        +'            <option value="Javascript">Javascript</option>'
                        +'            <option value="Node.js">Node.js</option>'
                        +'            <option value="versioncontrol">version control</option>'
                        +'            <option value="CSSframework">CSS framework</option>'
                        +'            <option value="CSSpreprocessors/postprocessors">CSS preprocessors/postprocessors</option>'
                        +'            <option value="Cloudhosting">Cloud hosting</option>'
                        +'            <option value="Mobileappprogramming">Mobile app programming</option>'
                        +'            <option value="Database">Database</option>'
                        +'            <option value="otherlanguages">Other Languages</option>'
                        +'            <option value="othertools">Other tools</option>'
                        +'</select>',
                    preConfirm: function () {
                        
                        if(!$('#swal-language-select').val())
                        {
                            swal.showValidationError("Please select Language/Technology!");
                        }

                        return [
                        $('#swal-language-select').val(),
                        ]
                    },
                    onOpen:()=>{
                        // 
                        $('.swal2-modal .dropdown').dropdown();
                    }
                }).then((result) => {
                    if(result.value)
                    {
                        swal({
                            title: 'Saving',
                            text: 'Please wait...',
                            onOpen: () => {
                                swal.showLoading()
                            },
                            allowOutsideClick: () => !swal.isLoading()
                        })

                        var language = result.value[0];
                        
                        $.ajax({
                            url:"{{route('j_g_skills_categories')}}",
                            type: 'GET',
                            data:{resume_id:{{$resume->id}}, language:language},
                            success:function(_data){
                                // 
                                console.log(_data)
                                var html = '<select id="swal-category-select" class="ui fluid normal dropdown multi-select" multiple>'
                                    + '<option value="">Select</option>';
                                for(var x in _data.resume_skills){
                                    var selected = '';
                                    $.grep(_data.user_skills, function(v,i){
                                        if(v.resume_skill_id == _data.resume_skills[x].id)
                                        selected = 'selected';
                                    });

                                    html += '<option '+selected+' value="'+_data.resume_skills[x].id+'">'+_data.resume_skills[x].category+'</option>';
                                }
                                swal({
                                    title: 'Select Language/Technology',
                                    html:html,
                                    preConfirm: function () {

                                        return [
                                        $('#swal-category-select').val(),
                                        ]
                                    },
                                    onOpen:()=>{
                                        // 
                                        $('.swal2-modal .dropdown').dropdown();
                                    }
                                }).then(result=>{
                                    if(result.value)
                                    {
                                        swal({
                                            title: 'Saving',
                                            text: 'Please wait...',
                                            onOpen: () => {
                                                swal.showLoading()
                                            },
                                            allowOutsideClick: () => !swal.isLoading()
                                        })

                                        $.ajax({
                                            url:"{{route('j_e_r_p_skills')}}",
                                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                            type: 'PATCH',
                                            data:{skills:result.value[0], language:language},
                                            success:function(_data){
                                                // 
                                                console.log(_data)
                                                swal({
                                                    title: 'All done!',
                                                    html:
                                                        '',
                                                    type:'success',
                                                    confirmButtonText: 'Ok'
                                                }).then(()=>{
                                                    updateResumeSkillsPanel(language,_data.skills);
                                                });
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            },
            // 'add-experiences':function(obj){
            //     swal(
            //         'Wanna Add Work Experience?',
            //         'Click OK',
            //         'question').then((result) => {
            //             if(result.value)
            //             {
            //                 swal.setDefaults({
            //                     input: 'text',
            //                     confirmButtonText: 'Next &rarr;',
            //                     showCancelButton: true,
            //                     progressSteps: ['1', '2', '3', '4', '5', '6', '7'],
            //                     customClass: 'swal-wide',
            //                 });

            //                 var steps = [
            //                     {
            //                         title: 'Company',
            //                         preConfirm: swalRequired,
            //                     },
            //                     {
                                    
            //                         title: 'Position',
            //                         preConfirm: swalRequired,
            //                     },
            //                     {
            //                         title: 'Responsibilities',
            //                         preConfirm: swalRequired,
            //                         input: 'textarea',
            //                     },
            //                     {
            //                         title: 'Month',
            //                         text: 'Month you started',
            //                         input: 'select',
            //                         inputOptions: {
            //                             @foreach(month_array() as $key => $value)
            //                             '{{$key}}':'{{$value}}',
            //                             @endforeach
            //                         },
            //                         preConfirm: swalRequired
            //                     },
            //                     {
            //                         title: 'Year',
            //                         text: 'Year you started',
            //                         input: 'select',
            //                         inputOptions: {
            //                             @foreach(year_array() as $key => $value)
            //                             '{{$key}}':'{{$value}}',
            //                             @endforeach
            //                         },
            //                         preConfirm: swalRequired
            //                     },
            //                     {
            //                         title: 'Month',
            //                         text: 'Month it ended',
            //                         input: 'select',
            //                         inputOptions: {
            //                             @foreach(month_array() as $key => $value)
            //                             '{{$key}}':'{{$value}}',
            //                             @endforeach
            //                         },
            //                         preConfirm: swalRequired
            //                     },
            //                     {
            //                         title: 'Year',
            //                         text: 'Year it ended',
            //                         input: 'select',
            //                         inputOptions: {
            //                             @foreach(year_array() as $key => $value)
            //                             '{{$key}}':'{{$value}}',
            //                             @endforeach
            //                         },
            //                         preConfirm: swalRequired
            //                     },
            //                 ]

            //                 swal.queue(steps).then((result) => {
            //                 swal.resetDefaults()

            //                 if (result.value) {
            //                     var __data = {
            //                         ex_company:result.value[0],
            //                         ex_postion:result.value[1],
            //                         ex_explanation:result.value[2],
            //                         ex_from_month:result.value[3],
            //                         ex_from_year:result.value[4],
            //                         ex_to_month:result.value[5],
            //                         ex_to_year:result.value[6],
            //                         resume_id:{{$resume->id}},
            //                         _method: "PATCH"
            //                     };
            //                     swal({
            //                         title: 'Saving',
            //                         text: 'Please wait...',
            //                         onOpen: () => {
            //                             swal.showLoading()
            //                         },
            //                         allowOutsideClick: () => !swal.isLoading()
            //                     })
            //                     $.ajax({
            //                         url:"{{route('j_c_r_p_experience')}}",
            //                         headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            //                         type: 'PATCH',
            //                         data:__data,
            //                         success:function(data){
            //                             // 
            //                             console.log(data)
            //                             addWorkExperience(data.experience);
            //                             obj.setEditButtonEdit($('#work-experiences .list-group-item:last-child').find('.pr-edit-btn'))
            //                             swal({
            //                                 title: 'All done!',
            //                                 type:'success',
            //                                 html:
            //                                     '',
            //                                 confirmButtonText: 'Ok'
            //                             })
            //                         }
            //                     });
            //                 }
            //             })
            //         }
            //     });
            // },
            'edit-experience':function(obj){
                swal({
                    title: 'Action',
                    text: 'What action do you wanna perform?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Update',
                    cancelButtonText: 'Delete'
                }).then((result)=>{
                    if (result.value) {
                        swal({
                            title: 'Loading Info',
                            text: 'Please wait...',
                            onOpen: () => {
                                swal.showLoading()
                            },
                            allowOutsideClick: () => !swal.isLoading()
                        })

                        $.ajax({
                            'url':"{{route('j_g_experience')}}",
                            type:"GET",
                            data:{id:obj.id},
                            success:function(experience){
                                swal(
                                    'Wanna Update Work Experience?',
                                    'Click OK',
                                    'question').then((result) => {
                                        if(result.value)
                                        {
                                            swal.setDefaults({
                                                input: 'text',
                                                confirmButtonText: 'Next &rarr;',
                                                showCancelButton: true,
                                                progressSteps: ['1', '2', '3', '4', '5', '6', '7'],
                                                customClass: 'swal-wide',
                                            });

                                            var steps = [
                                                {
                                                    title: 'Company',
                                                    preConfirm: swalRequired,
                                                    inputValue: experience.ex_company,
                                                },
                                                {
                                                    
                                                    title: 'Position',
                                                    preConfirm: swalRequired,
                                                    inputValue: experience.ex_postion,
                                                },
                                                {
                                                    title: 'Responsibilities',
                                                    preConfirm: swalRequired,
                                                    input: 'textarea',
                                                    inputValue: experience.ex_explanation,
                                                },
                                                {
                                                    title: 'Month',
                                                    text: 'Month you started',
                                                    input: 'select',
                                                    inputValue: experience.ex_from_month,
                                                    inputOptions: {
                                                        @foreach(month_array() as $key => $value)
                                                        '{{$key}}':'{{$value}}',
                                                        @endforeach
                                                    },
                                                    preConfirm: swalRequired
                                                },
                                                {
                                                    title: 'Year',
                                                    text: 'Year you started',
                                                    input: 'select',
                                                    inputValue: experience.ex_from_year,
                                                    inputOptions: {
                                                        @foreach(year_array() as $key => $value)
                                                        '{{$key}}':'{{$value}}',
                                                        @endforeach
                                                    },
                                                    preConfirm: swalRequired
                                                },
                                                {
                                                    title: 'Month',
                                                    text: 'Month it ended',
                                                    input: 'select',
                                                    inputValue: experience.ex_to_month,
                                                    inputOptions: {
                                                        @foreach(month_array() as $key => $value)
                                                        '{{$key}}':'{{$value}}',
                                                        @endforeach
                                                    },
                                                    preConfirm: swalRequired
                                                },
                                                {
                                                    title: 'Year',
                                                    text: 'Year it ended',
                                                    input: 'select',
                                                    inputValue: experience.ex_to_year,
                                                    inputOptions: {
                                                        @foreach(year_array() as $key => $value)
                                                        '{{$key}}':'{{$value}}',
                                                        @endforeach
                                                    },
                                                    preConfirm: swalRequired
                                                },
                                            ]

                                            swal.queue(steps).then((result) => {
                                            swal.resetDefaults()

                                            if (result.value) {
                                                var __data = {
                                                    id:experience.id,
                                                    ex_company:result.value[0],
                                                    ex_postion:result.value[1],
                                                    ex_explanation:result.value[2],
                                                    ex_from_month:result.value[3],
                                                    ex_from_year:result.value[4],
                                                    ex_to_month:result.value[5],
                                                    ex_to_year:result.value[6],
                                                    resume_id:{{$resume->id}},
                                                    _method: "PATCH"
                                                };
                                                swal({
                                                    title: 'Saving',
                                                    text: 'Please wait...',
                                                    onOpen: () => {
                                                        swal.showLoading()
                                                    },
                                                    allowOutsideClick: () => !swal.isLoading()
                                                })
                                                $.ajax({
                                                    url:"{{route('j_e_r_p_company_experiences')}}",
                                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                                    type: 'PATCH',
                                                    data:__data,
                                                    success:function(data){
                                                        // 
                                                        $('#experience-'+data.experience.id).html(data.experience.ex_company);
                                                        swal({
                                                            title: 'All done!',
                                                            type:'success',
                                                            html:
                                                                '',
                                                            confirmButtonText: 'Ok'
                                                        })
                                                    }
                                                });
                                            }
                                        })
                                    }
                                });
                            }
                        });
                    }
                    else if (result.dismiss === swal.DismissReason.cancel){
                        swal({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.value) {
                                swal({
                                    title: 'Updating database',
                                    text: 'Please wait...',
                                    onOpen: () => {
                                        swal.showLoading()
                                    },
                                    allowOutsideClick: () => !swal.isLoading()
                                })

                                $.ajax({
                                    url:"{{route('j_d_experience')}}",
                                    type:"delete",
                                    data:{id:obj.id},
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    success:function(data){
                                        swal(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        ).then(()=>{
                                            $('#experience-'+obj.id).closest('.list-group-item').remove();
                                        });
                                    }
                                });
                            }
                        })
                    }
                });
            },
            'edit-awards-cert':function(obj){
                swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })

                $.ajax({
                    'url':"{{route('j_g_award_certificate')}}",
                    type:"GET",
                    data:{id:obj.id},
                    success:function(resume){
                        // 
                        swal({
                            input:'textarea',
                            title: 'Award/Certificate',
                            text:'Fill up',
                            preConfirm: swalRequired,
                            inputValue: resume.awards,
                        }).then((result)=>{
                            if(result.value){
                                swal({
                                    title: 'Saving',
                                    text: 'Please wait...',
                                    onOpen: () => {
                                        swal.showLoading()
                                    },
                                    allowOutsideClick: () => !swal.isLoading()
                                })
                                console.log(result.value)
                                $.ajax({
                                    url:"{{route('j_e_r_p_meta')}}",
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    type: 'PATCH',
                                    data:{
                                        col:'awards',
                                        value:result.value
                                    },
                                    success:function(data){
                                        console.log(data)
                                        swal({
                                            title: 'All done!',
                                            type:'success',
                                            html:
                                                '',
                                            confirmButtonText: 'Ok'
                                        }).then(()=>{
                                            $('#awards-cert').html(data.resume.awards);
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            },
            'edit-portfolio':function(obj){
                swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })

                $.ajax({
                    'url':"{{route('json_get_resume')}}",
                    type:"GET",
                    data:{id:obj.id},
                    success:function(resume){
                        // 
                        swal({
                            input:'textarea',
                            title: 'Portfolio Websites',
                            text:'Fill up',
                            preConfirm: swalRequired,
                            inputValue: resume.websites,
                        }).then((result)=>{
                            if(result.value){
                                swal({
                                    title: 'Saving',
                                    text: 'Please wait...',
                                    onOpen: () => {
                                        swal.showLoading()
                                    },
                                    allowOutsideClick: () => !swal.isLoading()
                                })
                                console.log(result.value)
                                $.ajax({
                                    url:"{{route('j_e_r_p_meta')}}",
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    type: 'PATCH',
                                    data:{
                                        col:'websites',
                                        value:result.value
                                    },
                                    success:function(data){
                                        console.log(data)
                                        swal({
                                            title: 'All done!',
                                            type:'success',
                                            html:
                                                '',
                                            confirmButtonText: 'Ok'
                                        }).then(()=>{
                                            $('#portfolio').html(data.resume.websites);
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            },
            'edit-objective':function(obj){
                swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })

                $.ajax({
                    'url':"{{route('json_get_resume')}}",
                    type:"GET",
                    data:{id:obj.id},
                    success:function(resume){
                        // 
                        swal({
                            input:'textarea',
                            title: 'Objective',
                            text:'Fill up',
                            preConfirm: swalRequired,
                            inputValue: resume.objective,
                        }).then((result)=>{
                            if(result.value){
                                swal({
                                    title: 'Saving',
                                    text: 'Please wait...',
                                    onOpen: () => {
                                        swal.showLoading()
                                    },
                                    allowOutsideClick: () => !swal.isLoading()
                                })
                                console.log(result.value)
                                $.ajax({
                                    url:"{{route('j_e_r_p_meta')}}",
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    type: 'PATCH',
                                    data:{
                                        col:'objective',
                                        value:result.value
                                    },
                                    success:function(data){
                                        console.log(data)
                                        swal({
                                            title: 'All done!',
                                            type:'success',
                                            html:
                                                '',
                                            confirmButtonText: 'Ok'
                                        }).then(()=>{
                                            $('#objective').html(data.resume.objective);
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            },
            'edit-other_skills':function(obj){
                swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })

                $.ajax({
                    'url':"{{route('json_get_resume')}}",
                    type:"GET",
                    data:{id:obj.id},
                    success:function(resume){
                        // 
                        swal({
                            input:'textarea',
                            title: 'Other Skills',
                            text:'Fill up',
                            preConfirm: swalRequired,
                            inputValue: resume.other_skills,
                        }).then((result)=>{
                            if(result.value){
                                swal({
                                    title: 'Saving',
                                    text: 'Please wait...',
                                    onOpen: () => {
                                        swal.showLoading()
                                    },
                                    allowOutsideClick: () => !swal.isLoading()
                                })
                                console.log(result.value)
                                $.ajax({
                                    url:"{{route('j_e_r_p_meta')}}",
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    type: 'PATCH',
                                    data:{
                                        col:'other_skills',
                                        value:result.value
                                    },
                                    success:function(data){
                                        console.log(data)
                                        swal({
                                            title: 'All done!',
                                            type:'success',
                                            html:
                                                '',
                                            confirmButtonText: 'Ok'
                                        }).then(()=>{
                                            $('#other_skills').html(data.resume.other_skills);
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            },
            'edit-seminars_attended':function(obj){
                swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                })

                $.ajax({
                    'url':"{{route('json_get_resume')}}",
                    type:"GET",
                    data:{id:obj.id},
                    success:function(resume){
                        // 
                        swal({
                            input:'textarea',
                            title: 'Seminars Attended',
                            text:'Fill up',
                            preConfirm: swalRequired,
                            inputValue: resume.seminars_attended,
                        }).then((result)=>{
                            if(result.value){
                                swal({
                                    title: 'Saving',
                                    text: 'Please wait...',
                                    onOpen: () => {
                                        swal.showLoading()
                                    },
                                    allowOutsideClick: () => !swal.isLoading()
                                })
                                console.log(result.value)
                                $.ajax({
                                    url:"{{route('j_e_r_p_meta')}}",
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                    type: 'PATCH',
                                    data:{
                                        col:'seminars_attended',
                                        value:result.value
                                    },
                                    success:function(data){
                                        console.log(data)
                                        swal({
                                            title: 'All done!',
                                            type:'success',
                                            html:
                                                '',
                                            confirmButtonText: 'Ok'
                                        }).then(()=>{
                                            $('#seminars_attended').html(data.resume.seminars_attended);
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            },
        }
    });

    var table = $('#applications-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('itp/applicant/json/itp') !!}',
        columns: [
            { data: 'batch_name', name: 'batch_name', },
            { data: 'start_date', name: 'start_date', },
            { data: 'created_at', name: 'created_at', },
            {
                searchable: false,
                "orderable": false,
                "render": function ( data, type, row ) {
                    return '<a href="{{route('itp_create')}}/'+row['id']+'" title="edit" class="btn btn-primary btn-xs">'
                    +'Edit <i class="fa fa-edit"></i>'
                    +'</a> '
                    +'<a type="button" onclick="prep_del_batch('+row['id']+')" title="delete" class="btn btn-danger btn-xs">'
                    +'Delete <i class="fa fa-trash"></i>'
                    +'</a>';
                },
            }
        ],
        order: [[ 1, 'asc' ]]
    });

    $('#delete_application .delete').click(function(){
        $.ajax({
            url:"{{route('json_delete_itp_application')}}",
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            type:"POST",
            data:{id:$('#delete_application').data('id')},
            success:function(data){
                table.ajax.reload();
            },
            error:function(){}
        });
    });

    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");   
    });

    function swalRequired(inputValue){
        return new Promise((resolve) => {
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showValidationError("You need to write something!");
            }
            resolve()
        })
    }

    function updateResumeSkillsPanel(language, skills){
        var skills_container = $('#skill_required');

        // 
        var lang = language.toLowerCase() == 'c++' ? 'cplus2' : (language.toLowerCase() == "c#" ? 'csharp' : (language.toLowerCase() == 'node.js' ? 'node-js' : language.toLowerCase()) );
        console.log(skills.length)

        if(skills.length){
            skills_container.find('.'+lang).closest('.job-card').find('.body').html('');
            
            for(var i = 0; i < skills.length; i++){

                var card = skills_container.find('.'+lang).closest('.job-card');
                if(card.length){
                    card.find('.body').append('<div class="ellipsis">'+skills[i].category+'</div>');
                }
                else
                {
                    var x = 0;
                    var n = 0;
                    skills_container.find('.col-md-4').each(function(){
                        var _n = $(this).find('.job-card').length;
                        if(x > 2){
                            x = 0;
                        }
                        
                        if(x > 0)
                        {
                            if(n > _n){
                                return false;
                            }
                            else{
                                if(x == 2)
                                {
                                    x = 0;
                                    return false;
                                }

                                n = _n;
                            }
                        }
                        else{
                            n = _n
                        }

                        x++;
                    });

                    skills_container.find('.col-md-4').eq(x).append(
                        '<div class="job-card">'
                        +'    <div class="header ellipsis '+lang+'">'+skills[i].language+'</div>'
                        +'    <div class="body"><div class="ellipsis">'+skills[i].category+'</div> </div>'
                        +'</div>'
                    );
                }
            }
        }
        else{
            skills_container.find('.'+lang).closest('.job-card').remove();
        }
    }
});



// this code is for the upload resume file function
$('#choose_resume_file_bttn').click(function(){
    swal(
    'Upload New Resume File?',
    'Click OK',
    'question').then((result) => {
            if(result.value)
            {
                // 
                $('[name=resume_file]').trigger('click');
            }
    });
});

$('[name=resume_file]').change(function(){

    var myfile= $( this ).val();
    var ext = myfile.split('.').pop();
    if(ext=="pdf" || ext=="docx" || ext=="doc"){
        var formData = new FormData();
        formData.append('resume_file',this.files[0]);
        formData.append('resume_id','{{$resume->id}}');

        swal({
        title: 'Please confirm',
        type: 'info',
        html:
            'Click save',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:
            'Save',
        cancelButtonText:
        'Cancel',
        }).then(function(result){
            if(result.value){
                swal({
                    title: 'Saving',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
                });

                $.ajax({
                    url:"{{route('j_g_resume_file')}}",
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    type: 'POST',
                    data:formData,
                    success:function(data){
                        console.log(data);
                        swal({
                            title: 'All done!',
                            html:
                                '',
                            confirmButtonText: 'Ok',
                            type:'success'
                        }).then(()=>{
                            $("#noFile").text("Update Resume Document");
                            $('#resume-file-form').closest('.feature-box-style-gart').find('.feature-icon-gart').css({'background-color':'#b2eabd'});
                            $('#resume-file-form').closest('.feature-box-style-gart').find('.feature-icon-gart .fa').css({'color':'#ffffff'});
                        });
                    },
                    processData:false,
                    contentType: false,
                });
            }
        })
    }
    else
    {
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'Please choose .pdf, .doc, or .docx files!',
        })
    }

});

// end if code

function prep_del_batch(id){
    $('#delete_application').modal('show');
    $('#delete_application').data('id',id);
}


@if(\Auth::user()->resume()->first())
{{-- @if(isset($application)) --}}
    $(function(){
        var skill_requirements = JSON.parse("{{json_encode(\Auth::user()->resume()->first()->skills)}}".replace(/&quot;/g,'"'));
        {{-- 
        var skill_requirements = JSON.parse("{{json_encode($application->skills)}}".replace(/&quot;/g,'"'));
        --}}

        var skills_container = $('#skill_required');
        skills_container.find('.col-md-4').html('');
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
@endif


        $('#chooseFile').bind('change', function () {
        var filename = $("#chooseFile").val();
        // if (/^\s*$/.test(filename)) {
        //     $(".file-upload").removeClass('active');
        //     $("#noFile").text("No resume uploaded"); 
        // }
        // else {
        //     $(".file-upload").addClass('active');
        //     // $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
        //     $("#noFile").text("Upload updated resume"); 

        // }
        });

</script>

@endsection

@section('scripts')
<script src="{{ asset('js/profile_editor.js') }}"></script>
<script type="text/javascript" src="{{asset('js/croppie.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/unick-form.js')}}"></script>
@endsection
