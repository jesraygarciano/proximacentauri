
{{-- array of application information linked with this tab content --}}
<?php $show_applications = array() ?>
@foreach ($applications as $application)
    @if ($application->opening_id == $openings[$i]->id)
        <?php $show_applications[] = $application ?>
    @endif
@endforeach

@if (count($show_applications) > 0 || !isset($show_applications))
    @foreach ($show_applications as $show_application)
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 application_index" style="height:80px;">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="">
                @foreach ($applicants as $applicant)
                    @if ($show_application->user_id == $applicant->id)
                        @if ($applicant->is_active == 1)
                            <strong>
                                {{ $applicant->f_name }}
                                {{ $applicant->l_name }}
                            </strong>
                        @else
                            <strong style="color:rgb(233, 141, 141)">
                                Unsubscribed Already
                            </strong>
                        @endif
                    @endif
                @endforeach
                <br>
                Application Date : {{ $show_application->created_at }}
                <br>
                {{ $show_application->description }}
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="height:100%;	display: flex; align-items: center; justify-content: center;">

    {!! link_to(action('HiringPortalController@application_detail', $show_application->id), 'Details', ['class' => 'btn btn-primary']) !!}

            </div>
        </div>
    @endforeach
@else
    <hr>
    There are no applications
@endif
