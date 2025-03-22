@if ($paginator->hasPages())
    <div class="col-12">
        <div class="pagination d-flex justify-content-center mt-5">
            
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a href="#" class="rounded disabled" aria-disabled="true">&laquo;</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="rounded" rel="prev">&laquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="#" class="active rounded">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="rounded">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="rounded" rel="next">&raquo;</a>
            @else
                <a href="#" class="rounded disabled" aria-disabled="true">&raquo;</a>
            @endif

        </div>
    </div>
@endif
