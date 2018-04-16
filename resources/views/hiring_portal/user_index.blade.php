@extends('layouts.app')

@section('content')

<div class="container">
 <article>
    <h3>
        <h1>Lists of applicants</h1>
    </h3>
 </article>
    <hr>
    <div class="row">
        <div class="col-md-3" id="opening-search">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Applicant Search:</h4>
                        <form method="GET" action="{{Request::url()}}">
                            <div class="form-group">
                                {{-- {!!Form::label('applicant_search', '')!!} --}}
                                <div class="table-display">
                                  <input type="text" class="form-control cell-display no-b-radius-right" name="applicant_search" value="{{$_GET['applicant_search'] ?? ''}}" placeholder="Applicant name">
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
                                    <label for="formGroupExampleInput2">Applicant:</label>
                                    <input type="text" class="form-control" name="applicant_search" value="{{$_GET['applicant_search'] ?? ''}}" placeholder="Applicant name">
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
                                    <label for="exampleSelect1">Province:</label>
                                    <select class="form-control" name="province" id="province">
                                        <option value="" checked>Select Province</option>

                                        @foreach($provinces as $province)
                                        <option value="{{$province->iso_code}}">{{$province->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="">Select gender</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Salary Range Here -->
                                <hr>
                            <button style="margin-bottom: 10px;" type="submit" class="btn btn-primary form-control">Advanced search</button>
                            </div>
                            <center>
                                <a href="javascript:void(0)" id="as_bttn" data-toggle="collapse" data-target="#advance_search">
                                    Show Advance Search
                                </a>
                            </center>
                            <input type="hidden" name="show_advance_search" value="{{$_GET['show_advance_search'] ?? ''}}">
                            <script type="text/javascript">
                                $(document).ready(function(){

                                    var prevent_reoccur = false;

                                    $('#languages').val(JSON.parse('{{ json_encode($_GET['languages'] ?? '')}}'.replace(/&quot;/g,'"')));
                                    $('#province').val("{{$_GET['province'] ?? ''}}");
                                    $('#gender').val("{{$_GET['gender'] ?? ''}}");
                                    $('#salary_range').val("{{$_GET['salary_range'] ?? ''}}");
                                    $('#as_bttn').click(function(){

                                        if(prevent_reoccur){

                                            $('#advance_search' ).animate({ height : "0px" }, 400 );

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
        <!-- #f4b400 -->
        <div class="col-md-7">
            {{ count($applicants) ? ' ' : 'Sorry, No applicant result.'}}            
            @if (count($applicants) > 0)
                
                @foreach ($applicants as $applicant)


<style>
    ul.content-list{
    /**/
    }

    .content-list>li{
      position:relative;
      padding-left: 0px !important;
      padding-top: .5rem;
    }

    .content-list>li>div>.fa-file-text{
      position:absolute;
      left:6px;
      top:4.3px;
      font-size: 10px;
    }

    .content-list>li>div>.fa-map-marker{
      position:absolute;
      left:6.5px;
      top:4.3px;
      font-size: 12px;
    }

    .content-list>li>div>.fa-dollar{
      position:absolute;
      left:6.8px;
      top:4.2px;
      font-size: 12px;
    }

    .content-list>li>div>.fa-code{
      position:absolute;
      left:3.5px;
      top:4px;
      font-size: 12px;
    }

    .content-list>li>.li-content{
      display: inline-block;
    }

    .content-list>li>.i-wrapper{
      position: relative;
      height: 20px;
      width: 20px;
      border-radius: 10px;
      left: 5px;
      background-color: rgb(31, 89, 149);
      color: white;
    }

    .content-list>li>.text-wrapper{
      position: absolute;
      /*top:-1px;*/
      left:30px;
      width: 400px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
      /*height:30px;*/
    }
</style>
                    <div class="applicant-tile">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="applicant-image">
                                    <img src="{{asset('img/bg-img.png')}}" class="bg-img">
                                      @if(!empty($applicant->photo)) <!-- Should be !empty -->
                                           <img class="_image" src="{{ $applicant->photo }}" alt="{{ $applicant->f_name }}" />
                                      @else
                                          <img class="_image" src="{{asset('img/member-placeholder.png')}}">
                                      @endif

                                </div>
                            </div>
                            <div class="col-xs-9">
                                <!-- <div class="applicant-name"> -->
                                <ul class="feature-info-list content-list">
                                    <li class="ellipsis padding-right-110">
                                        <div class="li-content i-wrapper">
                                            <i class="fa fa-id-card" aria-hidden="true" style="padding:3px;"></i>
                                        </div>

                                        <div class="li-content text-wrapper">
                                            <a href="{{ url('hiring_portal/user_index_show', $applicant->id) }}">{{$applicant->f_name.' '.$applicant->l_name}}
                                            </a>
                                        </div>
                                    </li>
                                <!-- </div> -->
                                    <li class="ellipsis padding-right-110">
                                        <div class="li-content i-wrapper">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        </div>

                                        <div class="li-content text-wrapper">
                                             {{$applicant->country.', '.$applicant->city}}
                                        </div>

                                     </li>
                                    <li class="ellipsis padding-right-110">
                                        <div class="li-content i-wrapper">
                                            <i class="fa fa-intersex" aria-hidden="true" style="padding:5px;"></i>
                                        </div>

                                        <div class="li-content text-wrapper">
                                             {{$applicant->gender.', '.$applicant->gender}}
                                        </div>

                                    </li>
                                         <li class="ellipsis padding-right-110">

                                            <div class="li-content i-wrapper">
                                                <i class="fa fa-code" aria-hidden="true"></i>
                                            </div>

                                            <div class="li-content text-wrapper">
                                                @foreach(main_languages() as $main_language)
                                                    @if (return_master_resume($applicant))

                                                        @if($match_array = array_intersect(return_master_resume($applicant)->has_skill->pluck('id')->toArray(), get_language_ids($main_language)))
                                                            {{-- @if($x < 3) --}}
                                                                {{-- have to take away original key from $match_array --}}
                                                                <?php $match_array = array_values($match_array); ?>
                                                                @for($j=0; $j < count($match_array) ; $j++)
                                                                    @if($j == 0)
                                                                        <a href="#!" role="button" class="btn label label-warning {{main_languages_class_convert()[$main_language]}}" data-toggle="tooltip" data-placement="bottom" data-html="true" title="
                                                                        <div>{{return_category($match_array[$j])}}</div>
                                                                    @else
                                                                        <div>{{return_category($match_array[$j])}}</div>
                                                                    @endif

                                                                    @if($j == count($match_array) - 1)
                                                                        ">
                                                                        {{$main_language}}<span class="caret"></span>
                                                                    @endif
                                                                    </a>
                                                                @endfor
                                                            {{-- @endif --}}

                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                        <hr class="opening-top-date-hr" style="margin-top: 7px; margin-bottom: 7px;">
                        <div class="footer">
                            <div class="pull-left">
                                <div class="foggy-text"><b>Date registered</b>: {{ date(' M. j, Y ',strtotime($applicant->created_at)) }} </div>
                            </div>
                            <div class="pull-right">
                                <div class="foggy-text">
                                @include('hiring_portal.saved_applicants.save_applicant_bttn', ['applicants' => $applicants])
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    @include('layouts.pagination', ['paginator' => $applicants->appends($_GET)])
            @endif

        </div>
        <div class="col-md-2 well">
            <h4>Advertisement</h4>
        </div>
    </div>
</div>

@endsection
