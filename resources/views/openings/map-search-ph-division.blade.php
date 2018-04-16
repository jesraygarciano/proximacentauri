@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="page-header">
    	Map search | {{$code}}
    </h1>

    {{count($openings)?'':'No Result.'}}

    <div class="row">
        <div class="col-md-10">
            <div class="row">
            @foreach($openings as $opening)
                <div class="col-md-6">
                    <div class="job-tile">
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
                        <div class="job-title">
                            <a href="{{ url('openings', $opening->id) }}" class="ellipsis padding-right-110" style="display: block;"> {{ $opening->title }} </a>
                            {{-- <img class="pull-right" src="{{ $opening->company->company_logo }}" alt="" border="0" height="100" width="130" style="max-width: 130px;"> --}}
                            <span class="contain pull-right photo-adjust" style="background-image: url('{{ $opening->company->company_logo }}')"></span>
                            {{-- <div class="clear"></div> --}}
                        </div>
                        <div class="company-name_opening_list ellipsis padding-right-110"><a href="{{ url('companies', $opening->company->id) }}"> {{$opening->company->company_name}} </a>
                        </div>
                        <ul class="opening-feature-info-list">
                            <li class="ellipsis padding-right-110"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $opening->company->address1 }}
                            </li>
                            <li class="ellipsis padding-right-110"><i class="fa fa-dollar" aria-hidden="true"></i>                                    
                                <!-- Salary range -->
                                {!! salary_ranges()[$opening->salary_range] !!}
                            </li>
                            <li>
                                <i class="fa fa-code" aria-hidden="true"></i>
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
                            </li>
                        </ul>
                        <hr class="opening-top-date-hr" style="margin-top: 7px; margin-bottom: 7px;">
                        <div class="footer">
                            <div class="pull-left">
                                <div class="foggy-text"> {{ date(' M. j, Y ',strtotime($opening->created_at)) }} </div>
                            </div>
                            <div class="pull-right">
                                <div class="foggy-text">
                                    @include('openings.opening_bookmark.bookmark_button', ['opening' => $opening])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="col-md-2 well">
            <h4>Advertisement</h4>
        </div>
    </div>
</div>

@endsection
