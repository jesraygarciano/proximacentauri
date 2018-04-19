@if (Auth::check())
    <a class="save_applicant_bttn" data-id="{{ $applicant->id }}" style="color:{{Auth::user()->is_applicant_saved($applicant->id) ? '#ff9a0b!important' : '#808080'}};">
        <i class="fa fa-bookmark" aria-hidden="true"></i>
        <span class="_text" style="cursor: pointer;">{{Auth::user()->is_applicant_saved($applicant->id) ? 'Unsave applicant' : 'Save applicant'}} 
            (<b>{{ $applicant->scouters->count() }}</b>)
        </span>
    </a>
@endif
