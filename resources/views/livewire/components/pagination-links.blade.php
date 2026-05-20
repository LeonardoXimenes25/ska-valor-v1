<div>
   @if ($paginator->hasPages())
    <nav class="d-flex justify-content-between align-items-center bg-white p-3 shadow-sm rounded-3 border">
        {{-- Info Data --}}
        <div class="small text-muted d-none d-md-block">
            Menampilkan <strong>{{ $paginator->firstItem() }}</strong> - <strong>{{ $paginator->lastItem() }}</strong> 
            dari <strong>{{ $paginator->total() }}</strong> {{ $label ?? 'data' }}
        </div>

        <ul class="pagination mb-0">
            {{-- Prev --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link border-0 text-muted"><i class="bi bi-chevron-left"></i></span></li>
            @else
                <li class="page-item"><button type="button" class="page-link border-0" wire:click="previousPage" wire:loading.attr="disabled" rel="prev"><i class="bi bi-chevron-left"></i></button></li>
            @endif

            {{-- Angka Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link border-0">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link border-0 rounded-pill px-3 mx-1 shadow-sm">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <button type="button" class="page-link border-0 text-muted mx-1" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><button type="button" class="page-link border-0" wire:click="nextPage" wire:loading.attr="disabled" rel="next"><i class="bi bi-chevron-right"></i></button></li>
            @else
                <li class="page-item disabled"><span class="page-link border-0 text-muted"><i class="bi bi-chevron-right"></i></span></li>
            @endif
        </ul>
    </nav>
@endif
</div>
