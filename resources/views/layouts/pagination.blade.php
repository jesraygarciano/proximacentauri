@if ($paginator->lastPage() > 1)
<ul class="custom-pagenation">
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{($paginator->currentPage() == 1) ? 'javascript:void(0)':$paginator->url(1)}}"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
    </li>
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{($paginator->currentPage() == 1) ? 'javascript:void(0)':$paginator->url($paginator->currentPage()-1)}}"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </li>


    @if($paginator->currentPage() < 6)
        @for($i = 1; $i < ($paginator->lastPage() <  6? $paginator->lastPage()+1 : 6); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
    @elseif($paginator->lastPage() - $paginator->currentPage() < 6)
        @for($i = ($paginator->lastPage() < 5 ? 1 : $paginator->lastPage() - 5); $i <= $paginator->lastPage(); $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
    @else
        @for($i = $paginator->currentPage() - 2; $i <= $paginator->currentPage() + 2; $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
        @endfor
    @endif

    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{($paginator->currentPage() == $paginator->lastPage()) ? 'javascript:void(0)':$paginator->url($paginator->currentPage()+1)}}"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
    </li>
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{($paginator->currentPage() == $paginator->lastPage()) ? 'javascript:void(0)':$paginator->url($paginator->lastPage())}}"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
    </li>
</ul>
@endif
