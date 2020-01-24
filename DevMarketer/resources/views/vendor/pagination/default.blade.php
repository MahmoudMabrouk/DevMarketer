@if ($paginator->hasPages())
    <nav class="pagination is-centered m-t-20">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <a  class="pagination-prev" disabled>&lsaquo;</a>
        @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination.previous">&lsaquo;</a>
        @endif
        
        <ul class="pagination-list">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="pagination-ellipsis">&hellip;</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a class="pagination-links is-current" aria-current="page">{{ $page }}</a>
                            </li>
                            
                        @else
                            <li><a href="{{ $url }}" class="pagination-links">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

        </ul>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
    </nav>
@endif
