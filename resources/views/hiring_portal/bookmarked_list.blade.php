@extends('layouts.app')

@section('content')
<div class="container">
    <article>
        <h3>
            <h1>List of bookmarked users</h1>
        </h3>
    </article>

    <hr>
    <style type="text/css">
        .applicant-info-panel .fa-bookmark{
            position: absolute;
            right: 10px;
            top:0px;
            color: #a3a3a3;
            cursor: pointer;
        }

        ul.content-list{
        /**/
        }

        .content-list>li{
        position:relative;
        padding-left: 0px !important;
        padding-top: .5rem;
        }

        .content-list>li>div>.fa-file-text{
        position:absolute;
        left:6px;
        top:4.3px;
        font-size: 10px;
        }

        .content-list>li>div>.fa-map-marker{
        position:absolute;
        left:6.5px;
        top:4.3px;
        font-size: 12px;
        }

        .content-list>li>div>.fa-dollar{
        position:absolute;
        left:6.8px;
        top:4.2px;
        font-size: 12px;
        }

        .content-list>li>div>.fa-code{
        position:absolute;
        left:3.5px;
        top:4px;
        font-size: 12px;
        }

        .content-list>li>.li-content{
        display: inline-block;
        }

        .content-list>li>.i-wrapper{
        position: relative;
        height: 20px;
        width: 20px;
        border-radius: 10px;
        left: 5px;
        background-color: rgb(31, 89, 149);
        color: white;
        }

        .content-list>li>.text-wrapper{
        position: absolute;
        /*top:-1px;*/
        left:30px;
        width: 400px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        /*height:30px;*/
        }
    </style> 

    <div class="row">
        <div class="col-md-10">
            <div class="row">
           @if (count($applicants) > 0)
                @foreach ($applicants as $applicant)
                        <div class="col-md-6">                          
                    <div class="applicant-tile">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="applicant-image">
                                    <img src="{{asset('img/bg-img.png')}}" class="bg-img">
                                    <img class="_image" src="{{asset('img/member-placeholder.png')}}">
                                </div>
                            </div>
                            <div class="col-xs-9">
                        <ul class="feature-info-list content-list">
                            <li class="ellipsis padding-right-110">
                                <div class="li-content i-wrapper">
                                    <i class="fa fa-id-card" aria-hidden="true" style="padding:3px;"></i>
                                </div>

                                <div class="li-content text-wrapper">

                                    <a href="{{ url('hiring_portal/user_index_show', $applicant->id) }}">{{$applicant->f_name.' '.$applicant->l_name}}</a>
                                </div>
                            </li>
                        <!-- </div> -->
                            <li class="ellipsis padding-right-110">
                                <div class="li-content i-wrapper">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>

                                <div class="li-content text-wrapper">
                                        {{$applicant->country.', '.$applicant->city}}
                                </div>

                            </li>
                            <li class="ellipsis padding-right-110">
                                <div class="li-content i-wrapper">
                                    <i class="fa fa-intersex" aria-hidden="true" style="padding:5px;"></i>
                                </div>

                                <div class="li-content text-wrapper">
                                        {{$applicant->gender.', '.$applicant->gender}}
                                </div>

                            </li>
                                    <li class="ellipsis padding-right-110">

                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-code" aria-hidden="true"></i>
                                    </div>

                                    <div class="li-content text-wrapper">
                                        @foreach(main_languages() as $main_language)
                                            @if (return_master_resume($applicant))

                                                @if($match_array = array_intersect(return_master_resume($applicant)->has_skill->pluck('id')->toArray(), get_language_ids($main_language)))
                                                    {{-- @if($x < 3) --}}
                                                        {{-- have to take away original key from $match_array --}}
                                                        <?php $match_array = array_values($match_array); ?>
                                                        @for($j=0; $j < count($match_array) ; $j++)
                                                            @if($j == 0)
                                                                <a href="#!" role="button" class="btn label label-warning {{main_languages_class_convert()[$main_language]}}" data-toggle="tooltip" data-placement="bottom" data-html="true" title="
                                                                <div>{{return_category($match_array[$j])}}</div>
                                                            @else
                                                                <div>{{return_category($match_array[$j])}}</div>
                                                            @endif

                                                            @if($j == count($match_array) - 1)
                                                                ">
                                                                {{$main_language}}<span class="caret"></span>
                                                            @endif
                                                            </a>
                                                        @endfor
                                                    {{-- @endif --}}

                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            </ul>                                        

                                @include('hiring_portal.saved_applicants.save_applicant_bttn')
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>

        <div class="col-md-2 well">
            <h4>Advertisement</h4>
        </div>
    </div>
</div>
@endsection
