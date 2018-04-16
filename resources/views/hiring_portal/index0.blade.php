@extends('layouts.app')

@section('content')
    <div  class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-xs-3"> <!-- required for floating -->
        <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left">
                @if (count($companies) > 0)
                    @for ($i=0; $i < count($companies); $i++)
                        @if ($i == 0)
                            <li class="active"><a href="#{{$companies[$i]->id}}" data-toggle="tab">{{ $companies[$i]->company_name }}</a></li>
                        @else
                            <li><a href="#{{$companies[$i]->id}}" data-toggle="tab">{{ $companies[$i]->company_name }}</a></li>
                        @endif
                    @endfor
                @endif
            </ul>
        </div>
        <div class="col-xs-9">
            <div class="tab-content">
                @if (count($companies) > 0)
                    @for ($i=0; $i < count($companies); $i++)
                        @if ($i == 0)
                            <div class="tab-pane active" id="{{$companies[$i]->id}}">
                        @else
                            <div class="tab-pane" id="{{$companies[$i]->id}}">
                        @endif
                                <ul class="nav nav-tabs" id="{{$companies[$i]->id}}">
                                    <li class="active"><a data-toggle="tab" href="#hiring_information_{{$companies[$i]->id}}"> Current Hiring</a></li>
                                    <li><a data-toggle="tab" href="#application_{{$companies[$i]->id}}">Application</a></li>
                                    <li><a data-toggle="tab" href="#company_information_{{$companies[$i]->id}}">Company Information</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="hiring_information_{{$companies[$i]->id}}" class="tab-pane fade in active">
                                        <h3>HOME</h3>
                                            {{$companies[$i]->company_name}}
                                        <p>ホーム</p>
                                        {{ $a = 0 }}
                                        <br>
                                        @if (count($openings) > 0)
                                            @foreach ($openings as $opening)
                                                @if ($companies[$i]->id == $opening->company_id)
                                                    {!! $a += 1 !!}
                                                    {{$opening->title}}
                                                    <br>
                                                @endif
                                            @endforeach
                                        @endif
                                        <br>
                                        openingの数は{{ $a }}件です。
                                    </div>
                                    <div id="application_{{$companies[$i]->id}}" class="tab-pane fade">
                                        <h3>Menu 1</h3>
                                        <p>メニュー1</p>
                                    </div>
                                    <div id="company_information_{{$companies[$i]->id}}" class="tab-pane fade">
                                        @include('hiring_portal.index_parts.company_information')
                                    </div>
                                </div>
                            </div>
                    @endfor
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection
