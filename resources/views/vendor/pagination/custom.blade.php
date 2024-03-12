@if ($paginator->hasPages())
<ul class="m-datatable__pager-nav">
    @if ($paginator->onFirstPage())
        <li>
            <a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" disabled="disabled">
                <i class="la la-angle-left"></i>
            </a>
        </li>
    @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" style="text-decoration: none;" title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev">
                <i class="la la-angle-left"></i>
            </a>
        </li>
    @endif

    <li style="display: none;">
        <input type="text" class="m-pager-input form-control" title="Page number">
    </li>


    @foreach ($elements as $element)
            
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li>
                        <a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active">{{ $page }}</a>
                    </li>
                @else
                    <li>
                        <a href="{{ $url }}" style="text-decoration: none;" class="m-datatable__pager-link m-datatable__pager-link-number">{{ $page }}</a>
                    </li>
                @endif
                <!-- @if ($page == $paginator->currentPage())
                    <li>
                        <a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active">{{ $page }}</a>
                    </li>
                @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                    <li>
                        <a href="{{ $url }}" class="m-datatable__pager-link m-datatable__pager-link-number">{{ $page }}</a>
                    </li>
                @elseif ($page == $paginator->lastPage() - 1)
                    <li>
                        <a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-next"><i class="la la-ellipsis-h"></i></a>
                    </li>
                @endif -->
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" style="text-decoration: none;" title="Next" class="m-datatable__pager-link m-datatable__pager-link--next">
                <i class="la la-angle-right"></i>
            </a>
        </li>
    @else
        <li>
            <a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next m-datatable__pager-link--disabled" disabled="disabled">
                <i class="la la-angle-right"></i>
            </a>
        </li>
    @endif
</ul>
<div class="m-datatable__pager-info">
    <span class="m-datatable__pager-detail">Displaying 1 - 10 of {{ $paginator->total() }} records </span>
</div>
@endif

