@extends('layouts.app')

@section('content')

<div class="container">
    <article>
        <h3>
            <h1>List of Companies that scouted you</h1>
        </h3>
    </article>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="row">
                @if (count($companies) > 0)
                    @foreach ($companies as $company)
                        <div class="col-md-6">
                        <div class="scout-tile">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="photo-wrapper">
                                        <img src="{{asset('img/bg-img.png')}}" class="bg-img">
                                        <img class="_image" src="{{$company['company_logo']}}">
                                    </div>
                                </div>
                                <div class="col-xs-9">
                                    <div class="tile-title"><a href="{{ url('companies', $company['id']) }}"> {{ $company['company_name'] }} </a></div>
                                    <ul class="feature-info-list">
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $company['city'] }} </li>
                                        <li class="ellipsis-li">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            {{ $company['number_of_employee'] }} Employees
                                        </li>
                                        <li class="ellipsis-li">
                                            <i class="fa fa-laptop fa-lg" aria-hidden="true"></i>
                                            <a href="{{ $company['url'] }}">{{ $company['url'] }}</a>
                                        </li>
                                        <li class="ellipsis-li">
                                            <i class="fa fa-language fa-lg" aria-hidden="true"></i>
                                            {{ $company['bill_country'] }}
                                        </li>
                                        <li class="ellipsis-li">
                                            <i class="fa fa-file-o fa-lg" aria-hidden="true"></i>
                                            <a href="{{ url('companies', $company['id']) }}">
                                              {{ $company->openings->count() }} Current hiring
                                            </a>
                                        </li>
                                        <li class="ellipsis-li">
                                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                            Scouted on {{date(' M. j, Y ',strtotime($company->pivot->created_at))}}
                                        </li>
                                    </ul>
                                    <hr>
                                    {!! link_to( url('scouts/company_scout', $company['id']) , 'Message', ['class' => 'btn btn-primary']) !!} 
                                </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                    {{-- {!! $companies->render() !!} --}}
                @else
                    <h4>
                        You haven't received any scouts.
                    </h4>
                @endif
            </div>
        </div>
        <div class="col-md-2 well">
            <h4>Advertisement</h4>
        </div>
    </div>
</div>
    
@endsection
