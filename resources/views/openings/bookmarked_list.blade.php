@extends('layouts.app')

@section('content')

<div class="container">
    <article>
        <h3>
            <h1>List of bookmarks</h1>
        </h3>
    </article>

    <hr>
    
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                @if (count($bookmarks) > 0)
                        @foreach ($bookmarks as $opening)
                            <div class="col-md-6">
                            @include('inc.job-container')
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
