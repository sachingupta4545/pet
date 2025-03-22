@if ($paginator->hasPages())
    <div class="col-12">
        <div class="pagination d-flex justify-content-center mt-5">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="rounded">&laquo;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="rounded" wire:click="previousPage">&laquo;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="active rounded">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="rounded" wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="rounded" wire:click="nextPage">&raquo;</a>
            @else
                <span class="rounded">&raquo;</span>
            @endif
        </div>
    </div>
@endif
