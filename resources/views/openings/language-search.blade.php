@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="page-header">
    	Language search | {{ $language }}
    </h1>

    <h1>
    {{ count($openings) ? ' ' :'No Result.'}}
    </h1>

    <div class="row">
        <div class="col-md-10">
            <div class="row">
            @foreach($openings as $opening)
                <div class="col-md-6">
                    <div class="job-tile">
                        <div>
                            <span class="job-position featured">Featured</span>
                            <span class="job-position regular">Regular</span>
                            <span class="job-position intern">Intern</span>
                        </div>
                        <div class="title">
                            <div class="job-title">
                                <div class="ellipsis">
                                    <a href="{{ url('openings', $opening->id) }}"> {{ $opening->title }} </a>
                                </div>
                            </div>
                            <div class="company-name">
                                <div class="ellipsis" style="padding-right: 155px;">
                                    <a href="{{ url('companies', $opening->company->id) }}"> {{$opening->company->company_name}} </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="photo-wrapper">
                            <img src="http://localhost:8000/img/bg-img.png" class="bg-img">
                            <img class="_image" src="/storage/{{ $opening->company->company_logo }}">
                        </div>
                        <ul class="feature-info-list">
                            <li class="ellipsis-li"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $opening->company->address1 }} </li>
                            <li class="ellipsis-li"><i class="fa fa-dollar" aria-hidden="true"></i> PHP 10,000 - 15,000 </li>
                            <li>
                                <i class="fa fa-code" aria-hidden="true"></i>
                                <div class="label label-warning java">
                                    Java
                                </div>
                                <div class="label label-primary python">
                                    Python
                                </div>
                                <div class="label label-info javascript">
                                    <div class="hover-info">
                                        <div class="pointer"></div>
                                        <div class="content">
                                            <ul>
                                                <li>JQuery</li>
                                                <li>Angular</li>
                                            </ul>
                                        </div>
                                    </div>
                                    Javascript
                                </div>
                                <div class="label label-info html">
                                    HTML
                                </div>
                            </li>
                        </ul>
                        <div class="footer">
                            <hr style="margin-top: 7px; margin-bottom: 7px;">
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
