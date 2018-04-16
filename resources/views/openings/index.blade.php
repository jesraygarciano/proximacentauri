@extends('layouts.app')

@section('content')

<script type="text/javascript">
    $(document).ready(function(){
        // mark opening link active
        $('.openings_nav').addClass('active');
    });
</script>

<div class="container">
    <article>
        <h3>
            <h1>Search Jobs</h1>
        </h3>
    </article>
    <hr>
    <div class="container-fluid" id="opening">
        <div class="row">
            <div class="col-md-3 col-sm-9 col-xs-12" id="opening-search">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>General Search:</h4>
                        <form method="GET" action="{{Request::url()}}">
                            <div class="form-group">
                                {{-- {!!Form::label('opening_search', '')!!} --}}
                                <div class="table-display">
                                  <input type="text" class="form-control cell-display no-b-radius-right" name="opening_search" value="{{$_GET['opening_search'] ?? ''}}" placeholder="Job title">
                                  <span class="input-group-btn cell-display">
                                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                  </span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <form method="GET" action="{{Request::url()}}">
                            <div id="advance_search" class="collapse" style="overflow: hidden;">
                                <br/>
                                <h4>Advanced Search:</h4>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Company:</label>
                                    <input type="text" class="form-control" name="company_name" value="{{$_GET['company_name'] ?? ''}}" placeholder="Company name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelect1">Province:</label>
                                    <select class="form-control" name="province" id="province">
                                        <option value="" checked>Select Province</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->iso_code}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleSelect1">Programming Languages:</label>

                                    <select multiple="" id="languages" name="languages[]" class="ui fluid normal dropdown multi-select">
                                        <option value="">Select Languages</option>
                                        <option value="php">PHP</option>
                                        <option value="ruby">Ruby</option>
                                        <option value="java">Java</option>
                                        <option value="c++">C++</option>
                                        <option value="python">Python</option>
                                        <option value="swift">Swift</option>
                                        <option value="go">Go</option>
                                        <option value="c#">C#</option>
                                        <option value="javascript">Javascript</option>
                                        <option value="node">NodeJS</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Hiring Type</label>
                                        <select class="form-control" name="hiring_type" id="hiring_type">
                                            <option value="">Select type</option>
                                            <option value="0">Internship</option>
                                            <option value="1">Regular</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Salary Range</label>
                                        {!!Form::select('salary_range', salary_ranges(), null, ['class' => 'form-control', 'id' => 'salary_range'])!!}
                                    </div>
                                </div>
                                <hr>
                                <button style="margin-bottom: 10px;" type="submit" class="btn btn-primary form-control">
                                    Advanced search
                                </button>
                            </div>
                            <center><a href="javascript:void(0)" id="as_bttn" data-toggle="collapse" data-target="#advance_search">Show Advance Search</a></center>
                            <input type="hidden" name="show_advance_search" value="{{$_GET['show_advance_search'] ?? ''}}">
                            <script type="text/javascript">
                                $(document).ready(function(){

                                    var prevent_reoccur = false;

                                    $('#languages').val(JSON.parse('{{ json_encode($_GET['languages'] ?? '')}}'.replace(/&quot;/g,'"')));
                                    $('#province').val("{{$_GET['province'] ?? ''}}");
                                    $('#hiring_type').val("{{$_GET['hiring_type'] ?? ''}}");
                                    $('#salary_range').val("{{$_GET['salary_range'] ?? ''}}");
                                    $('#as_bttn').click(function(){

                                        if(prevent_reoccur){

                                            $('#advance_search').animate({ height : "0px" }, 400 );

                                            $('[name=show_advance_search]').val('closed');
                                            prevent_reoccur = false;
                                            return false;
                                        }

                                        if($('#advance_search').attr('aria-expanded') == 'true')
                                        {
                                            $('[name=show_advance_search]').val('closed');
                                            $('#as_bttn').html('Show Advance Search');
                                        }
                                        else
                                        {
                                            $('[name=show_advance_search]').val('open');
                                            $('#as_bttn').html('Hide Advance Search');
                                        }
                                    });
                                    if($('[name=show_advance_search]').val()=='open'){
                                        prevent_reoccur = true;
                                        $('#as_bttn').html('Hide Advance Search');
                                        $('#advance_search').show();
                                        $('#advance_search').attr('aria-expanded',true);
                                        $('#as_bttn').attr('aria-expanded',true);
                                    }
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-sm-9 col-xs-12">
                {{ count($openings) ? ' ' : 'Sorry, no result.'}}
                @if (count($openings) > 0)
                    @foreach ($openings as $opening)
                        @include('inc.job-container')
                    @endforeach

                    @include('layouts.pagination', ['paginator' => $openings->appends($_GET)])
                    {{-- {!!$openings->appends(['company_name'=>$company_name])->render()!!} --}}
                    {{-- {!! $openings->render() !!} --}}
                @endif
            </div>
            <div id="ad-for-opening-list" class="col-md-2 col-sm-3">
                <div class="text-center advertisement-2">
                    Advertisement
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
