<div class="row">
    <div class="col-sm-12">
        <h2>Company Information</h2>
    </div>
</div>
<style type="text/css">

</style>
<div class="row">
    <div class="col-md-12 cover-info">
        <div class="row">
            <div class="col-md-12">
                <div class="cover-image">
                    <img src="{{ $company->background_photo }}" alt="{{ $company->company_name}} Cover photo" />
                </div>
            </div>
        </div>
        <div class="row cover-info">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-2 col-xs-4">
                        <div class="picture">
                            <div class="photo-wrapper">
                                <img src="{{asset('img/bg-img.png')}}" class="bg-img">
                                <img class="_image" src="{{ $company->company_logo }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row under-photo">
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div id="company_name_single_page">
                            <a href="{{ url('companies', $company['id']) }}">
                                {{ $company->company_name }}
                                <br>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 address-established">
                        <div class="single-company-info-wrapper">
                            <div class="li-content-forcom-single i-wrapper">
                                <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="li-content-forcom-single text-wrapper">
                                &nbsp; {{ $company->address1 }}, {{ $company->city }}, {{ $company->country }}
                            </div>
                        </div>
                        <div class="single-company-info-wrapper">
                            <div class="li-content-forcom-single i-wrapper">
                                <i class="fa fa-users fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="li-content-forcom-single text-wrapper">
                                &nbsp; {{ $company->population }}
                            </div>
                        </div>
                        <div class="single-company-info-wrapper">
                            <div class="li-content-forcom-single i-wrapper">
                                <i class="fa fa-laptop fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="li-content-forcom-single text-wrapper">
                                &nbsp;
                                <a href="{{ $company->url }}">
                                    {{ $company->url }}
                                </a>
                            </div>
                        </div>
                        <div class="single-company-info-wrapper">
                            <div class="li-content-forcom-single i-wrapper">
                                <i class="fa fa-file-o fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="li-content-forcom-single text-wrapper">
                                &nbsp;
                                <a href="{{ url('companies', $company->id) }}">
                                    {{ $company->openings->count() }} Current hiring
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="margin-top:12px; margin-bottom:5px;">
<div class="row">
    <div class="col-md-7 col-sm-12 col-xs-12">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 com-single-header">
                <h3 class="">About us:</h3>
            </div>
        </div>

        <div class="row">
            <p class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                {{ $company->what }}
            </p>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 com-single-header">
                <h3 class="">Why join us?:</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                <img style="height:100%;width:100%;" src="{{ $company->what_photo1 }}" alt="{{ $company->company_name}} Cover photo" />
                <p style="">
                    {{ $company->what_photo1_explanation }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-12 col-xs-12 com-single-header">
        <h3>Company details:</h3>
        <ul class="company-list-info">

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        CEO:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->ceo_name }}
                    </div>
                <div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Established at:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->established_at }}
                    </div>
                <div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Company website URL:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->url }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Company size:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->company_size }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Email:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->email }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Company address:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->address1 }}, {{ $company->city }}, {{ $company->country }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Company Tel:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->tel }}
                    </div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="field-name col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        Language spoken:
                    </div>
                    <div class="field-value col-sm-11 col-sm-offset-1 col-xs-11 col-xs-offset-1">
                        {{ $company->spoken_language }}
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

@if(!empty($company->address1))
    <div class="container text-center" style="height:500px;width:100%; margin-top:50px;">
            {!! Mapper::render() !!}
    </div>
@endif
@if (!Auth::guest())
    @if (Auth::user()->role == 1)
        @if (in_array(Auth::user()->id, $companies_ids))
            <br/>
            {!! link_to(action('CompaniesController@edit', [$company->id]), '編集', ['class' => 'btn btn-primary']) !!}
            <br/>
            {!! Form::open(['method' => 'DELETE', 'url' => ['companies', $company->id]]) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    @endif
@endif
