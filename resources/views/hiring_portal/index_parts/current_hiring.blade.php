@if (count($openings) > 0)
    @foreach ($openings as $opening)
        <div class="col-md-6">
            @include('inc.job-container')
        </div>
    @endforeach

    {{-- {!!$openings->appends(['company_name'=>$company_name])->render()!!} --}}
    {{-- {!! $openings->render() !!} --}}
@endif
{{-- <div class="clearfix"></div> --}}
