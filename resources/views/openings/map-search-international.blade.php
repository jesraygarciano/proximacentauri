@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="page-header">
    	Map search | {{$country->name}}
    </h1>

    {{count($openings)?'':'No Result.'}}

    <div class="row">
        <div class="col-md-10">
            <div class="row">
            @foreach($openings as $opening)
                <div class="col-md-6">
                    @include('inc.job-container')
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
