@extends('layouts.app')

@section('content')
<div class="container">
    <div class="single-page" class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a data-toggle="tab" href="#compinfo">
                    Company Information
                </a>
            </li>
            <li role="presentation">
                <a data-toggle="tab" href="#joblists">
                    Opening Job lists
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div role="tabpanel" id="compinfo" class="tab-pane active">
                @include('companies.company-single')
            </div>

            <div id="joblists" class="tab-pane fade">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Current Hiring Jobs</h2>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-10 col-sm-9">
                            <div class="row">
                                {{ count($openings) ? ' ' : 'No other current hiring.'}}
                                @if (count($openings) > 0)
                                    @foreach ($openings as $opening)
                                        <div class="col-md-6">
                                            @include('inc.job-container',['opening'=>$opening])
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div id="ad-for-opening-show" class="col-md-2 col-sm-3">
                            <div class="text-center advertisement-2">
                                Advertisement
                            </div>
                        </div>
                    </div>
                </div> {{-- END OF ROW --}}
            </div>
        </div>
    </div>
</div>
@endsection
