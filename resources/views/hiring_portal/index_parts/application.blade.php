<div class="col-xs-3">
    <ul class="nav nav-tabs-ver tabs-left">
        @if (count($openings) > 0)
            @for ($i=0; $i < count($openings); $i++)
                @if ($i == 0)
                    <li class="active"><a class="ellipsis" href="#application_{{$openings[$i]->id}}" data-toggle="tab">
                        {{ $openings[$i]->title }}
                    </a></li>
                @else
                    <li><a class="ellipsis" href="#application_{{$openings[$i]->id}}" data-toggle="tab">
                        {{ $openings[$i]->title }}
                    </a></li>
                @endif
            @endfor
        @else
            <div style="font-size:14px; margin-top:20px;">
                There are no applications.
            </div>
        @endif
    </ul>
</div>
<div class="col-xs-9">
    <div class="tab-content">
        @if (count($openings) > 0)
            @for ($i=0; $i < count($openings); $i++)
                @if ($i == 0)
                    <div class="tab-pane active" style="word-break: break-all;" id="application_{{$openings[$i]->id}}">
                        {{ $openings[$i]->id }}
                        {{ $openings[$i]->title }}
                        @include('hiring_portal.index_parts.application_parts')
                    </div>
                @else
                    <div class="tab-pane" style="word-break: break-all;" id="application_{{$openings[$i]->id}}">
                        {{ $openings[$i]->id }}
                        {{ $openings[$i]->title }}
                        @include('hiring_portal.index_parts.application_parts')
                    </div>
                @endif
            @endfor
        @endif
    </div>
</div>
<div class="clearfix"></div>
