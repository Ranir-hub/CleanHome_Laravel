@if ($paginator->hasPages())
<div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
    <nav aria-label="Page navigation">
        <ul class="pagination mb-0">
            {{-- First Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}" rel="first">&laquo;</a>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&rsaquo;</span>
                </li>
            @endif
            
            {{-- Last Page Link --}}
            @if ($paginator->onLastPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">&raquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="last">&raquo;</a>
                </li>
            @endif
        </ul>
    </nav>
    <div class="d-flex align-items-center gap-2">
        Элементов на странице:
        <form method="get" action="{{ url('order') }}" class="d-flex align-items-center gap-2">
            <select name = "perpage" class="form-select form-select-sm">
                <option value = "5" @if($paginator->perPage() == 5) selected @endif</option>5</option>
                <option value = "10" @if($paginator->perPage() == 10) selected @endif</option>10</option>
                <option value = "15" @if($paginator->perPage() == 15) selected @endif</option>15</option>
            </select>
            <button type="submit" class="btn btn-sm btn-outline-primary">Изменить</button>
        </form>
    </div>
</div>
@endif
