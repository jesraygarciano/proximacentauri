<style type="text/css">
            .ribbon {
            position: absolute;
            right: -7px;
            bottom: 135px;
            z-index: 1;
            overflow: hidden;
            width: 113px;
            height: 73px;
            text-align: right;            
        }
</style>
<div class="company-title-list" style="padding-bottom: 40px; position:relative; background: white; box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 3px 0 rgba(0,0,0,0.12)!important; border:1px solid #dddddd;">

    <div class="ellipsis" style="font-size:20px; margin-bottom:10px;">
        <a href="{{ url('companies', $company['id']) }}" class="ellipsis">
            {{ $company->company_name }}
            <br>
            {{-- {{ dd($company)}} --}}
        </a>
    </div>

    <div class="media-body" style="height: 100px;">
        <ul style="padding-left:2px;" class="content-list-forcom">
            <li>
                <div class="li-content-forcom i-wrapper">
                    <i class="fa fa-map-marker" aria-hidden="true" style=""></i>
                </div>
                <div class="li-content-forcom text-wrapper">
                    {{ $company->city }},
                    {{ $company->country }}
                </div>
            </li>
            <li>
                <div class="li-content-forcom i-wrapper">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="li-content-forcom text-wrapper">
                    {{ $company->population }}
                </div>
            </li>
            <li>
                <div class="li-content-forcom i-wrapper">
                    <i class="fa fa-laptop" aria-hidden="true"></i>
                </div>
                <div class="li-content-forcom text-wrapper">
                    <a href="{{ $company->url }}">{{ $company->url }}</a>
                </div>
            </li>
            <li>
                <div class="li-content-forcom i-wrapper">
                    <i class="fa fa-file-o" aria-hidden="true"></i>
                </div>
                <div class="li-content-forcom text-wrapper">
                    <a href="{{ url('companies', $company->id) }}">
                        {{ $company->openings->count() }} Current hiring
                    </a>
                </div>
            </li>
            {{-- <li>
                <div class="li-content-forcom i-wrapper">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
                <div class="li-content-forcom text-wrapper">
                    Latest posted:
                    {{ $company->updated_at }}
                </div>
            </li> --}}
        </ul>
    </div>
    <img class="d-flex ml-3 company_tile_photo" src="{{ $company->company_logo }}" alt="{{ $company->company_name}}" alt="{{ $company->company_name}}"/>
    <div style="position: absolute; padding:0px 15px; width: 100%; left: 0px; bottom: 0px;">
        <hr style="margin:0px;">
        <div class="pull-right" style="margin:7px 0px; cursor: pointer;">
            <div class="ribbon">
                @include('companies.follow_company.follow_button', ['company' => $company])
            </div>
        </div>
    </div>
</div>
