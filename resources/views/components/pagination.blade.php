@if ($paginator->lastPage() > 1)
<nav aria-label="Page navigation" class="mt-5">
    <ul class="pagination justify-content-center">

        {{-- Previous --}}
        <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                Sebelumnya
            </a>
        </li>

        {{-- Page Numbers --}}
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="page-item {{ $paginator->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

        {{-- Next --}}
        <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                Berikutnya
            </a>
        </li>

    </ul>
</nav>
@endif