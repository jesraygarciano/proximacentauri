{{--@if (Auth::check())
        @if (Auth::user()->is_applicant_saved($applicant->id))
            {!! Form::open(['route' => ['unsave_applicant_index', $applicant->id], 'method' => 'delete']) !!}
                <a href="#" onclick="this.parentNode.submit()"><i class="fa fa-bookmark fa-2x" title="Unsave Applicant" style="color:rgb(244, 180, 0);" aria-hidden="true">
                	<span style="color: black; font-size: 14px; position: absolute; right: 100%; top: 50%; transform: translateY(-50%); margin-right: 10px; font-weight: bold;">{{$applicant->scouters->count()}}</span>
                </i></a>
            {!! Form::close() !!}
        @else
            {!! Form::open(['route' => ['save_applicant_index', $applicants[$i]->id]]) !!}
                <a href="#" onclick="this.parentNode.submit()"><i class="fa fa-bookmark fa-2x" title="Save Applicant" aria-hidden="true">
                	<span style="color: black; font-size: 14px; position: absolute; right: 100%; top: 50%; transform: translateY(-50%); margin-right: 10px; font-weight: bold;">{{$applicants[$i]->scouters->count()}}</span>
                </i></a>
            {!! Form::close() !!}
        @endif
    @endif
--}}

@if (Auth::check())
    <a class="save_applicant_bttn" data-id="{{ $applicant->id }}" style="color:{{Auth::user()->is_applicant_saved($applicant->id) ? '#ff9a0b!important' : '#808080'}};">
        <i class="fa fa-bookmark" aria-hidden="true"></i>
        <span class="_text">{{Auth::user()->is_applicant_saved($applicant->id) ? 'Unsave applicant' : 'Save applicant'}} 
            (<b>{{ $applicant->scouters->count() }}</b>)
        </span>
    </a>
@endif
