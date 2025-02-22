@if ($paginator->hasPages())
<nav class="d-flex justify-items-center justify-content-between mt-2">
    <div class="d-flex justify-content-between flex-fill d-sm-none">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.previous')</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
            </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
            </li>
            @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link">@lang('pagination.next')</span>
            </li>
            @endif
        </ul>
    </div>

    <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
        <div>
            <p class="small text-muted">
                {!! __('Showing') !!}
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                {!! __('of') !!}
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>

        <div>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link disabled" rel="next" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">&laquo;</span><span class="sr-only">First</span>
                    </a>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" rel="next" href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">&laquo;</span><span class="sr-only">First</span>
                    </a>
                </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                @else
                <li class="page-item "><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" rel="next" href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>
                    </a>
                </li>
                @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@endif