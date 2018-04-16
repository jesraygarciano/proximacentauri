@extends('layouts.app')

@section('content')
<div class="container">
    <article>
        <h3>
            <h3>List of followed companies</h3>
        </h3>
    </article>
    <hr>

    <div class="row" id="followed-company_lists">
        <div class="col-md-10 col-sm-9 col-xs-12">
            @if (count($follows) > 0)
                @foreach ($follows as $follow)
                        <div id="first-comp-list" class="col-xs-12 col-sm-12 col-md-6">
                            @include('companies.company-container',['company'=>$follow])
                        </div>
                @endforeach
            @endif
        </div>
        <div id="ad-for-followed-list" class="col-md-2 col-sm-3">
            <div class="text-center advertisement-2">
                Advertisement
            </div>
        </div>
    </div>
</div>
@endsection
