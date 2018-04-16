@extends('layouts.app')

@section('content')

    <!-- inline css || uelmar -->
    <style type="text/css">
        .info-container{
            padding: 10px;
            white-space: initial;
            /*position: relative;*/
        }

        /*.job-position-list{
            margin:10px;
        }*/

        .feature-info-list{
            list-style: none;
            padding: 0px;
        }

        .feature-info-list li .label{
            position: relative;
            display: inline-block;
            cursor: pointer;
            padding: 4px;
            font-size: 90%;
        }

        .feature-info-list li .info-icon {
            position: absolute;
            left: 0px;
        }

        .feature-info-list li .hover-info{
            position: absolute;
            top: 100%;
            left: 0px;
            margin-top: 5px;
            display: none;
            z-index: 1000;
        }

        .feature-info-list li .label:hover .hover-info{
            display: block;
        }

        .feature-info-list li .hover-info .pointer{
            position: absolute;
            bottom:100%;
            left: 10px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 5px 5px 5px;
            border-color: transparent transparent #cecece transparent;
        }

        .feature-info-list li .hover-info .content{
            background: white;
            border:1px solid #cecece;
            color: white;
            padding: 5px;
            border-radius: 5px;
            background: #4d5355;
            width: 100px;
        }

        .feature-info-list li .hover-info .content ul{
            padding-left: 15px;
        }

        .feature-info-list li{
            padding-left: 20px;
            padding-right: 110px;
            white-space:normal;
            position: relative;
            margin-top: 4px;
        }

        .info-container .feature-info-list li:last-child{
            height :25px;
        }

        .li-code{
            /*border: 1px solid #000000;*/
            margin-top: 5px;
        }

        .info-icon_address_money:before{
            margin-left: 3px;
            padding-bottom: -50px;
        }

        .job-title{
            font-size: 20px;
            margin-bottom: 1px;
        }

        .company-name{
            /**/
            margin-bottom: 10px;
        }

        .company-name a{
            color: inherit;
        }

        .landing-cover{
            position: relative;
            z-index: 1;
        }

        .landing-cover .bg-image{
            width: 100%;
        }

        .landing-cover .image{
            position: absolute;
            width: 100%;
            left: 50%;
            top:50%;
            transform: translateY(-50%) translateX(-50%);
            transition:1000ms ease all;
        }

        .landing-cover .shadow{
            position: absolute;
            left: 0px;
            top: 0px;
            height: 100%;
            width: 100%;
            -webkit-box-shadow: inset 0px -20px 20px 0px rgba(0, 0, 0, 0.64);
            transition: 1000ms ease all;
        }

        .landing-cover:hover .shadow{
            -webkit-box-shadow: inset 0px -30px 20px 0px rgba(0, 0, 0, 0.64);
        }

/*        .landing-cover:hover .image{
            transform: translateY(-50%) translateX(-50%) scale(1.1);
        }

        .landing-cover:hover .landing-page-search{
            -webkit-backface-visibility: hidden;
        }*/

        .xtext12{
            position: relative;
            font-weight: bold;
            font-size: 30px;
            color:white;
            padding-top: 15px;
            padding-bottom: 5px;
            text-align: center;
            background: #066c9c;
        }

        .landing-page-search{
        }

        .landing-page-search .tab-content{
            margin: 0px;
        }

        @media(max-width: 800px){
            .landing-cover{
                height: initial;
            }

            .landing-page-search{
                width: 100%;
                padding: 10px;
            }
        }



        /*for hiring information of carousel*/
        .content-list>li{
          position:relative;
          padding-left: 0px !important;
        }

        .content-list>li>div>.fa-file-text{
          position:absolute;
          left:5.5px;
          top:4px;
          font-size: 10px;
        }

        .content-list>li>div>.fa-map-marker{
          position:absolute;
          left:3.1px;
          top:4.3px;
          font-size: 12px;
        }

        .content-list>li>div>.fa-dollar{
          position:absolute;
          left:3.1px;
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
          top:-1px;
          left:30px;
          width: 180px;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
        }

        .content-list>li>.code-wrapper{
          position: absolute;
          top:-1px;
          left:30px;
          width: 180px;
        }



        /*for company information*/
        .content-list-com>li{
          position:relative;
          margin-top: 0px;
          margin-bottom: 0px;
          padding-left: 0px !important;
        }

        .content-list-com>li>div>.fa-map-marker{
          position:absolute;
          left:7px;
          top:4.3px;
          font-size: 12px;
        }

        .content-list-com>li>div>.fa-users{
          position:absolute;
          left:4px;
          top:4.2px;
          font-size: 12px;
        }

        .content-list-com>li>div>.fa-laptop{
          position:absolute;
          left:3.5px;
          top:4px;
          font-size: 12px;
        }

        .content-list-com>li>div>.fa-language{
          position:absolute;
          left:5px;
          top:4.1px;
          font-size: 12px;
        }

        .content-list-com>li>div>.fa-file-o{
          position:absolute;
          left:5.5px;
          top:4.1px;
          font-size: 12px;
        }

        .content-list-com>li>.li-content{
          display: inline-block;
        }

        .content-list-com>li>.i-wrapper{
          position: relative;
          height: 20px;
          width: 20px;
          border-radius: 10px;
          left: 5px;
          background-color: rgb(31, 89, 149);
          color: white;
        }

        .content-list-com>li>.text-wrapper{
          position: absolute;
          top:-1px;
          left:30px;
          width: 180px;
          overflow: hidden;
          text-overflow: ellipsis;
          white-space: nowrap;
        }

        .content-list-com>li>.code-wrapper{
          position: absolute;
          top:-1px;
          left:30px;
          width: 180px;
        }
        .ribbon {
        /*  position: absolute;
          right: -5px; top: -5px;
          z-index: 1;
          overflow: hidden;
          width: 75px; height: 75px;
          text-align: right;*/
/*            position: absolute;
            right: -27px;
            bottom: 156px;
            z-index: 1;
            overflow: hidden;
            width: 113px;
            height: 73px;
            text-align: right;*/
            position: absolute;
            right: -7px;
            bottom: 184px;
            z-index: 1;
            overflow: hidden;
            width: 113px;
            height: 73px;
            text-align: right;
        }
        .ribbon{
          cursor: pointer;
        }
        #ribbon-company{
          position: absolute;
          right: 1px;
          bottom: 177px;
        }
    </style>

    <div class="general-hero" style="margin-top:-30px;">
        <div class="landing-cover">
            <div class="wrap-tab-content-wrapper">
                <div class="tab-content-wrapper"></div>
            </div>

            <div class="general_heading">
                <h2>Quality job search for programmers</h2>
                <h5>Build your professional identity online and stay connected with opportunities.</h5>
            </div>

            <div class="landing-page-search">
                <div style="border:5px solid white; display: table; height: 50px; width: 100%; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important; border-radius: 4px;">
                    <div class="btn-group unick-drop-down">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Openings
                        <span class="caret"></span>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#opening-tab">Openings
                        </a>
                        <a class="dropdown-item" href="#company-tab">Company
                        </a>
                      </div>
                    </div>
                    <!-- <ul class="nav nav-tabs landing-search-tab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="tab" href="#opening-tab" role="tab" aria-controls="home" aria-selected="true">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#company-tab" role="tab" aria-controls="profile" aria-selected="false">Company</a>
                        </li>
                    </ul> -->
                    <div class="tab-content" style="margin-top:0px;">
                        <div class="tab-pane active" id="opening-tab" role="tabpanel" aria-labelledby="home-tab">
                            <form method="GET" action="{{route('openings.index')}}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="opening_search"  placeholder="Search for jobs" />
                                    <div class="input-group-btn">
                                        <div class="btn-group" role="group">
                                            <div class="dropdown dropdown-lg">
                                                <button type="button" class="btn btn-default dropdown-toggle"       data-toggle="dropdown" aria-expanded="false">
                                                    Additional Filter <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                  <div class="form-group dropdown-allow-click">
                                                    <label for="languages">Programming Language </label>
                                                    <input name="show_advance_search" type="hidden" value="open">
                                                    <select multiple="" id="languages" name="languages[]" class="ui fluid normal dropdown multi-select">
                                                        <option value="">Select Languages</option>
                                                        <option value="php">PHP</option>
                                                        <option value="ruby">Ruby</option>
                                                        <option value="java">Java</option>
                                                        <option value="c++">C++</option>
                                                        <option value="python">Python</option>
                                                        <option value="swift">Swift</option>
                                                        <option value="go">Go</option>
                                                        <option value="c#">C#</option>
                                                        <option value="javascript">Javascript</option>
                                                        <option value="node">NodeJS</option>
                                                    </select>
                                                  </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Search
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="company-tab" role="tabpanel" aria-labelledby="home-tab">
                            <form method="GET" action="{{route('companies.index')}}">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="company_name"  placeholder="Search for Company" />
                                    <div class="input-group-btn">
                                        <div class="btn-group" role="group">
                                            <button type="submit" class="btn btn-primary">
                                                Search
                                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('.dropdown-allow-click').click(function(){
                                    $(this).closest('.dropdown').addClass('open');
                                    return false;
                                });

                                $('.landing-page-search .dropdown-item').click(function(ev){
                                    ev.preventDefault();
                                    $('.landing-page-search .unick-drop-down .dropdown-toggle').html($(this).html());
                                    $('.landing-page-search .tab-pane').removeClass('active');
                                    $($(this).attr('href')).addClass('active');
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="feature-post-carosel" id="feature-post-carosel">
            <div class="xtext12"> Featured Jobs </div>
            <div class="post-container" style="overflow: hidden;">
                <div class="wing">
                    <?php $p = -1; ?>
                    @foreach( $featured_openings as $opening)
                    <?php $p++; ?>
                    <div class="post-item" data-ind="ind_{{$p}}">
                        <div class="info-container">
                            <div>
                                <ul class="ribbon_style_list">
                                  @if($opening->featured_status == 1)
                                      <li class="job-position featured">Featured</li>
                                  @endif
                                  @if($opening->hiring_type == 0)
                                      <li class="job-position intern">Intern</li>
                                  @elseif($opening->hiring_type == 1)
                                      <li class="job-position regular">Regular</li>
                                  @elseif($opening->hiring_type == 2)
                                      <li class="job-position intern">Temporary</li>
                                  @endif
                                </ul>
                            </div>
                            <div class="job-title ellipsis">
                                <a href="{{ url('openings', $opening->id) }}"> {{ $opening->title }} </a>
                            </div>
                            <div class="company-name ellipsis">
                              <a href="{{ url('companies', $opening->company->id) }}"> {{$opening->company->company_name}} </a>
                            </div>
                            <div style="/*height: 130px; width: 130px; */position:absolute; right:3px; top:80px;" class="photo-wrapper pull-right">
                                <span class="contain" style="background-image: url('{{ $opening->company->company_logo }}')"></span>
                            </div>
                            <ul class="feature-info-list content-list">
                                <li>
                                    <div class="li-content i-wrapper">
                                        <i class="info-icon fa fa-file-text" aria-hidden="true"></i>
                                    </div>
                                    <div class="li-content text-wrapper">
                                        {!! $opening->requirements !!}
                                    </div>
                                </li>
                                <li>
                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-map-marker info-icon info-icon_address_money" aria-hidden="true">
                                        </i>
                                    </div>
                                    <div class="li-content text-wrapper">
                                        {{$opening->address1}},
                                        {{$opening->address2}},
                                        @foreach($provinces as $province)
                                            {{$province->iso_code === $opening->province_code ? $province->name : ''}}
                                        @endforeach
                                        {{$opening->postal}}

                                    </div>
                                </li>
                                <li>
                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-dollar info-icon info-icon_address_money" aria-hidden="true">
                                        </i>
                                    </div>
                                    <div class="li-content text-wrapper">
                                        {!! salary_ranges()[$opening->salary_range] !!}
                                    </div>

                                </li>
                                <li class="li-code">
                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-code info-icon" aria-hidden="true"></i>
                                    </div>

                                    <div class="li-content code-wrapper">
                                        <?php $x = 0; ?>
                                        @foreach(main_languages() as $main_language)
                                            @if($match_array = array_intersect($opening->has_skill->pluck('id')->toArray(), get_language_ids($main_language)))
                                                @if($x < 3)
                                                    {{-- have to take away original key from $match_array --}}
                                                    <?php $match_array = array_values($match_array); ?>

                                                    @for($i=0; $i < count($match_array) ; $i++)
                                                        @if($i == 0)
                                                            <a href="#!" role="button" class="btn label label-warning {{main_languages_class_convert()[$main_language]}}" data-toggle="tooltip" data-placement="bottom" data-html="true" title="
                                                            <div>{{return_category($match_array[$i])}}</div>
                                                        @else
                                                            <div>{{return_category($match_array[$i])}}</div>
                                                        @endif

                                                        @if($i == count($match_array) - 1)
                                                            ">
                                                            {{$main_language}}<span class="caret"></span>
                                                        @endif
                                                        </a>
                                                    @endfor
                                                @endif
                                                <?php $x++; ?>
                                            @endif
                                        @endforeach

                                        @if($x > 3)
                                            <a href="#!" role="button" onclick="display_skills('{{addslashes(json_encode($opening->load("skill_requirements")))}}',this)" class="btn label label-default">
                                                ...
                                            </a>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                            <hr class="opening-top-date-hr" style="margin-top: 7px; margin-bottom: 7px;">
                            <div class="footer" >
                                <div class="pull-left" style="margin-top: 11px;">
                                    <div class="foggy-text"> {{ date(' M. j, Y ',strtotime($opening->created_at)) }} </div>
                                </div>
                                <div class="pull-right" style="margin-top: 11px;">
                                    <div class="foggy-text">
                                      @if (Auth::check() && (!Auth::user()->role == 1))
                                        <div class="ribbon">
                                          @include('openings.opening_bookmark.bookmark_button', ['opening' => $opening])
                                        </div>
                                      @endif
                                    </div>
                                </div>
                                <div class="clear" style="clear: both;"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <ul class="indicators">
              <li class="active"><div class="indecator-item"></div></li>
              <li><div class="indecator-item"></div></li>
              <li><div class="indecator-item"></div></li>
              <li><div class="indecator-item"></div></li>
              <li><div class="indecator-item"></div></li>
            </ul>
            <!-- <div style="text-align: center;">
                <a href="{{ url('openings') }}" type="button" class="btn btn-info">See All</a>
            </div> -->
            <div class="carosel-controls">
                <div class="left"><i class="fa fa-chevron-left"></i></div>
                <div class="right"><i class="fa fa-chevron-right"></i></div>
            </div>
            <center>
                <a href="{{ url('openings') }}" class="oblong-bttn violet-bttn"> See all Jobs </a>
            </center>
        </div>
    </div>
    <!-- initializing feature hiring post car0sel -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#feature-post-carosel').featuredPostCarosel();
        });
    </script>

	<div class="general_portal container" style="margin-bottom:100px;">

        <h3 id="or-search">Programming Languages</h3>
        <hr>
        <ul class="ud-list">
            <li>
                    <a href="{{ url('openings?languages%5B%5D=php&show_advance_search=open') }}">
                    {{--<a href="{{ url('openings?languages%5B%5D=php&show_advance_search=open') }}">--}}
                    <div class="round-icon medium-round-icon php">
                        <img src="http://www.rnm.solutions/wp-content/uploads/2018/01/icon-php1-1.png">
                    </div>
                    <b>Php</b>
                </a>
            </li>
            <li>
                {{--<a href="{{route('search_opening_with_language').'?language=ruby'}}">--}}
                    <a href="{{ url('openings?languages%5B%5D=ruby&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon ruby" style="background: #ead57d!important;">
                        <img src="https://rebornix.gallerycdn.vsassets.io/extensions/rebornix/ruby/0.15.0/1503328840286/Microsoft.VisualStudio.Services.Icons.Default">
                    </div>
                    <b>Ruby</b>
                </a>
            </li>
            <li>
                {{-- <a href="{{route('search_opening_with_language').'?language=java'}}"> --}}
                <a href="{{ url('openings?languages%5B%5D=java&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon java" style="background: #ffffff!important;">
                        <img src="https://images.sftcdn.net/images/t_optimized,f_auto/p/2f4c04f4-96d0-11e6-9830-00163ed833e7/3163796423/java-runtime-environment-logo.png">
                    </div>
                    <b>Java</b>
                </a>
            </li>
            <li>
                    <a href="{{ url('openings?languages%5B%5D=c%2B%2B&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon cplus2" style="background: #28aeff!important;">
                        <img src="https://png.icons8.com/color/1600/c-plus-plus-logo.png">
                    </div>
                    <b>C++</b>
                </a>
            </li>
            <li>
                <a href="{{ url('openings?languages%5B%5D=python&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon python" style="background: #fff1cc!important;">
                        <img src="http://www.iconarchive.com/download/i73027/cornmanthe3rd/plex/Other-python.ico">
                    </div>
                    <b>Python</b>
                </a>
            </li>
        </ul>
        <ul class="ud-list" style="margin-top:-50px;">

            <li>
                <a href="{{ url('openings?languages%5B%5D=swift&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon">
                        <div class="swift-round">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Swift_logo.svg/2000px-Swift_logo.svg.png">
                        </div>
                    </div>
                    <b>Swift</b>
                </a>
            </li>
            <li>
                <a href="{{ url('openings?languages%5B%5D=go&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon go">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Gogophercolor.png/1024px-Gogophercolor.png">
                    </div>
                    <b>Go</b>
                </a>
            </li>
            <li>
                <a href="{{ url('openings?languages%5B%5D=c%23&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon csharp" style="background: #ba85fe!important;">
                        <img src="https://developer.fedoraproject.org/static/logo/csharp.png">
                    </div>
                    <b>C#</b>
                </a>
            </li>
            <li>
                <a href="{{ url('openings?languages%5B%5D=javascript&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon {{-- javascript --}}" {{-- style="background: #9cffff; --}}>
                        <img src="http://www.northeastjsconference.com/wp-content/uploads/2015/11/learn-javascript.png"  id="javascript-imgsize">
                    </div>
                    <b>Javascript</b>
                </a>
            </li>
            <li>
                <a href="{{ url('openings?languages%5B%5D=node&show_advance_search=open') }}">
                    <div class="round-icon medium-round-icon r-language">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/R_logo.svg/2000px-R_logo.svg.png">
                    </div>
                    <b>R</b>
                </a>
            </li>
        </ul>
        <div class="row" style="display: none;">
            <div class="col-md-6">
                <div class="simple-tile">
                    <div class="tile-icon round-icon medium-round-icon">
                        <img src="https://cdn.worldvectorlogo.com/logos/php-1.svg">
                    </div>
                    <div class="text-content">
                        <b><a href="#">Php</a></b>
                        <div>
                            PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-6">
                <div class="simple-tile">
                    <div class="tile-icon round-icon medium-round-icon">
                        <img src="{{ asset('img/python.png') }}">
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-6">
                <div class="simple-tile">
                    <div class="tile-icon round-icon medium-round-icon">
                        <img src="{{ asset('img/nodejs.png') }}">
                    </div>
                    <div class="text-content">
                        <b><a href="#">NodeJS</a></b>
                        <div>
                            Node.js is an open-source, cross-platform JavaScript run-time environment for executing JavaScript code server-side.
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-md-6">
                <div class="simple-tile">
                    <div class="tile-icon round-icon medium-round-icon">
                        <img src="{{ asset('img/ruby.png') }}">
                    </div>
                    <div class="text-content">
                        <b><a href="#">RUBY</a></b>
                        <div>
                            A ruby is a pink to blood-red colored gemstone, a variety of the mineral corundum (aluminium oxide).
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <h3 id="or-search">
          <a href="{{ url('companies') }}">
              Companies
          </a>
        </h3>
        <hr>
        <div class="row">
            <style type="text/css"></style>
            @if (count($companies) > 0)
                @foreach($companies as $company)
                    <div class="col-sm-6 col-md-4">
                        <div class="{{-- media --}} {{-- well --}} company-tile">
                          <div>
                            <h3 class="mt-0 mb-1">
                                <a class="ellipsis" style="display: block;" href="{{ url('companies', $company['id']) }}">
                                    {{$company['company_name']}}
                                    <br>
                                </a>
                            </h3>
                            <ul class="feature-info-list company-feature content-list-com" style="">
                                <li>
                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-map-marker " aria-hidden="true"></i>
                                    </div>
                                    <div class="li-content text-wrapper">
                                        {{-- <div class="ellipsis"> --}}
                                            {{ $company['city'] }},
                                            {{ $company['country'] }}
                                            &nbsp;
                                        {{-- </div> --}}
                                    </div>
                                </li>
                                <li>
                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-users " aria-hidden="true"></i>
                                    </div>
                                    <div class="li-content text-wrapper">
                                        <div class="ellipsis">
                                          {{ $company['number_of_employee'] }} <b>Employees</b>
                                          &nbsp;
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-laptop " aria-hidden="true"></i>
                                    </div>
                                    <div class="li-content text-wrapper">
                                        <div class="ellipsis">
                                          {{ $company['url'] }}
                                          &nbsp;
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-language " aria-hidden="true"></i>
                                    </div>
                                    <div class="li-content text-wrapper">
                                        <div class="ellipsis">
                                          {{ $company['bill_country'] }}
                                          &nbsp;
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="li-content i-wrapper">
                                        <i class="fa fa-file-o " aria-hidden="true"></i>
                                    </div>
                                    <div class="li-content text-wrapper">
                                        <div class="ellipsis">
                                          <a href="{{ url('companies', $company['id']) }}">
                                            {{ $company->openings->count() }} Current hiring
                                            &nbsp;
                                          </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                              <hr style="margin-top: 7px; margin-bottom: 7px;">
                              <div id="company-bookmark">
                                <div class="d-flex align-self-end ml-3" style="text-align: right;color: #000;">
                                    <!--<a href="">
                                      <i class="fa fa-star-o " aria-hidden="true"></i>
                                      Follow
                                    </a> -->
                                      <div class="ribbon" id="ribbon-company">
                                        @include('companies.follow_company.follow_button', ['company' => $company])
                                      </div>
                                </div>
                              </div>
                          </div> <!-- media body -->
                            <div style="position:absolute; right:15px; top:41px;" class="photo-wrapper pull-right">
                                {{-- <img src="http://localhost:8000/img/bg-img.png" class="bg-img"> --}}
                                {{-- <img class="_image" src="{{ $company->company_logo }}"> --}}
                                <span class="contain" style="background-image: url('{{ $company->company_logo }}')"></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row" style="margin-top:30px;">
            <div class="col-md-4">
                @include('inc.philippine-map')
            </div>
            <div class="col-md-8">
                <h3 style="margin-top:5px;">Domestic (Philippines)</h3>
                <hr>
                <h3 class="unick-header">
                    <div class="text">
                        <a href="{{route('portal_ph_division_search','Luzon')}}/">Luzon</a>
                    </div>
                </h3>
                @foreach($provinces as $province)
                    @if($province->division == 'Luzon')
                    <a href="{{url('openings').'/?show_advance_search=open&province='.$province->iso_code}}" style="display: inline-block; margin: 5px;padding: 7px;" role="button" class="btn label label-primary">
                        {{$province->name.' ('.$province->hirings}})
                    </a>
                    @endif
                @endforeach
                <h3 class="unick-header">
                    <div class="text">
                        <a href="{{route('portal_ph_division_search','Visayas')}}/">Visayas</a>
                    </div>
                </h3>
                @foreach($provinces as $province)
                    @if($province->division == 'Visayas')
                    <a href="{{url('openings').'/?show_advance_search=open&province='.$province->iso_code}}" style="display: inline-block; margin: 5px;padding: 7px;" role="button" class="btn label label-primary">
                        {{$province->name.' ('.$province->hirings}})
                    </a>
                    @endif
                @endforeach
                <h3 class="unick-header">
                    <div class="text">
                        <a href="{{route('portal_ph_division_search','Mindanao')}}/">Mindanao</a>
                    </div>
                </h3>
                @foreach($provinces as $province)
                    @if($province->division == 'Mindanao')
                    <a href="{{url('openings').'/?show_advance_search=open&province='.$province->iso_code}}" style="display: inline-block; margin: 5px;padding: 7px;" role="button" class="btn label label-primary">
                        {{$province->name.' ('.$province->hirings}})
                    </a>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="row" style="margin-top:30px;">
            <div class="col-md-12">
                <h3>International (Worldwide)</h3>
                @include('inc.world-map')
            </div>
            <div class="col-md-8">
                <hr>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui alias facere eum dolorum obcaecati corrupti minima, aspernatur ut delectus harum unde tempore, exercitationem est natus adipisci quisquam fugiat numquam ipsum voluptates earum, et mollitia assumenda sapiente reiciendis? Ipsam delectus, nobis error perspiciatis nihil, sed cumque consectetur laudantium deleniti! Doloribus impedit maxime aut, deleniti quis explicabo ducimus voluptatibus aliquid quos numquam alias, quaerat! Quis quod cupiditate vel architecto, consequatur repellendus, alias.
            </div>
        </div>
    </div>

<script type="text/javascript">

    $(function(){

        $(".input-group-btn .dropdown-menu li a").click(function(){

            var selText = $(this).html();

           //working version - for multiple buttons //
           $(this).parents('.input-group-btn').find('.btn-search').html(selText);

       });

    });

</script>
@endsection
