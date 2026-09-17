@if ($paginator->hasPages())
    <nav class="pager" role="navigation" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="pager__btn is-disabled">Precedent</span>
        @else
            <a class="pager__btn" href="{{ $paginator->previousPageUrl() }}" rel="prev">Precedent</a>
        @endif

        <span class="pager__info">Page {{ $paginator->currentPage() }} sur {{ $paginator->lastPage() }}</span>

        @if ($paginator->hasMorePages())
            <a class="pager__btn" href="{{ $paginator->nextPageUrl() }}" rel="next">Suivant</a>
        @else
            <span class="pager__btn is-disabled">Suivant</span>
        @endif
    </nav>
@endif
