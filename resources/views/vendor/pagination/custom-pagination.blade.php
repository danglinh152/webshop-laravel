<ul class="pagination justify-content-center d-flex">
    <li class="page-item">
        @if ($paginator->onFirstPage())
        <span class="disabled">« Previous</span>
        @else
        <a href="{{ $paginator->previousPageUrl() }}">« Previous</a>
        @endif
    </li>

    @foreach ($elements as $element)
    <li class="page-item">
        @if (is_string($element))
        <span class="disabled">{{ $element }}</span>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url) <!-- Corrected this line -->
        @if ($page == $paginator->currentPage())
        <span class="current">{{ $page }}</span>
        @else
        <a href="{{ $url }}">{{ $page }}</a>
        @endif
        @endforeach
        @endif
    </li>
    @endforeach

    <li class="page-item">
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}">Next »</a>
        @else
        <span class="disabled">Next »</span>
        @endif
    </li>
</ul>

<style>
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
    }

    .pagination a,
    .pagination .current,
    .pagination .disabled {
        padding: 8px 16px;
        margin: 0 4px;
        text-decoration: none;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .pagination .current {
        background-color: #007bff;
        color: white;
    }

    .pagination .disabled {
        color: #ccc;
    }
</style>