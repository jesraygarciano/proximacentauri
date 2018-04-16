@extends('layouts.app')

@section('content')

<script type="text/javascript">
    $(document).ready(function(){
        // mark opening link active
        $('.company_nav').addClass('active');
    });
</script>

<style type="text/css">
    input[type="checkbox"]:focus{
        outline:0;
    }

    input[type="checkbox"] {
        appearance: none;
        background-color: #fafafa;
        border: 1px solid #d3d3d3;
        border-radius: 26px;
        cursor: pointer;
        height: 28px;
        position: relative;
        transition: border .25s .15s, box-shadow .25s .3s, padding .25s;
        width: 44px;
        vertical-align: top;
        -webkit-appearance: none;
    }
    input[type="checkbox"]:after {
        background-color: white;
        border: 1px solid #d3d3d3;
        border-radius: 24px;
        box-shadow: inset 0 -3px 3px rgba(0, 0, 0, 0.025), 0 1px 4px rgba(0, 0, 0, 0.15), 0 4px 4px rgba(0, 0, 0, 0.1);
        content:'';
        display: block;
        height: 24px;
        left: 0;
        position: absolute;
        right: 16px;
        top: 0;
        transition: border .25s .15s, left .25s .1s, right .15s .175s;
    }
    input[type="checkbox"]:checked {
        border-color: #1c7da6;
        box-shadow: inset 0 0 0 13px #1c7da6;
        padding-left: 18px;
        transition: border .25s, box-shadow .25s, padding .25s .15s;
    }
    input[type="checkbox"]:checked:after {
        border-color: #1c7da6;
        left: 16px;
        right: 0;
        transition: border .25s, left .15s .25s, right .25s .175s;
    }
    .checkbox-inline{
        margin-top: 1rem!important;
    }
    .with_hiring_text{
        font-weight: 500;
        padding-left: 5rem;
        width: 300px;
        color: #1e7ba5;
    }
    .with_comp-info_btn{
        position: absolute;
        top: 46px;
        left: 0px;
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: bold;
    }
</style>

<div class="container">
    <div id="company-list">
        <h2 class="text-center">Company list</h2>
        <hr>
        <div class="row">
            <div id="search-list-wrapper" class="col-md-10 col-sm-9">
                <div id="company-search">
                    {!!Form::open(['action' => 'CompaniesController@index', 'method' => 'GET', 'class' => 'form-wrapper cf' , 'role' => 'search']) !!}
                    {{-- {!!Form::label('opening_search', '')!!} --}}
                    {{ csrf_field() }}

                    <input type="text" class="company-search form-control" name="company_name" value="{{$_GET['company_name'] ?? ''}}" placeholder="Search companies">

                    <button type="submit">Search</button>
                    <div style="position: relative;">
                        <label class="with_comp-info_btn">
                            {{-- {!!Form::checkbox('w_hiring_info', 2, null, ['class' => 'with_hiring'])!!} --}}
                            <input type="checkbox" class="with_hiring" name="w_hiring_info" value="2"
                            <?php if(isset($_GET['w_hiring_info'])) echo "checked='checked'"; ?>
                            />
                            <h5 class="with_hiring_text" style="cursor: pointer;">With hiring information</h5>

                        </label>
                    </div>
                    {!!Form::close()!!}
                </div> <!-- End company-search -->

                <div id="company-single-lists">
                    {{ count($companies) ? ' ' : 'Sorry, No company result.'}}
                    <div class="row">
                        @if (count($companies) > 0)
                            @foreach ($companies as $company)
                                <div id="first-comp-list" class="col-xs-12 col-sm-12 col-md-6">
                                    @include('companies.company-container')
                                </div>
                            @endforeach
                            <center>@include('layouts.pagination',['paginator'=>$companies])</center>
                        @endif
                    </div>
                </div>
            </div>
            <div id="ad-for-opening-list" class="col-md-2 col-sm-3">
                <div class="text-center advertisement-2">
                    Advertisement
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-placeholder-multiple').select2(
            );
        });
        </script>
    </div>
</div>

@endsection
