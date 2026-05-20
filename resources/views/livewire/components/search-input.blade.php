<div class="position-relative w-100" wire:key="search-wrapper-{{ strtolower(class_basename($model)) }}">
    {{-- Search Bar Group --}}
    <div class="input-group shadow-sm border rounded-3 overflow-hidden bg-white">
        <span class="input-group-text border-0 bg-transparent px-3">
            <i class="bi bi-search text-muted"></i>
        </span>
        
        <input 
            type="text" 
            class="form-control border-0 shadow-none ps-0 py-2"
            placeholder="{{ $placeholder }}"
            wire:model.live.debounce.300ms="query" {{-- Mencegah input lag --}}
            autocomplete="off"
        >

        @if(!empty($query))
            <button class="btn border-0 bg-transparent px-3" wire:click="clear" type="button">
                <i class="bi bi-x-lg text-muted small"></i>
            </button>
        @endif
    </div>

    {{-- Dropdown Suggestion & Empty State --}}
    @if(!empty($query) && strlen($query) >= 2)
        <ul class="list-group position-absolute w-100 mt-1 shadow-lg border-0" style="z-index: 1050;">
            @forelse($results as $result)
                <li 
                    class="list-group-item list-group-item-action border-0 py-2 px-3" 
                    style="cursor: pointer;"
                    wire:click="selectResult({{ $result['id'] }})"
                    wire:key="result-{{ $result['id'] }}"
                >
                    <div class="d-flex align-items-center">
                        <i class="bi bi-arrow-right-short text-primary me-2"></i>
                        <span>{{ $result[$column] }}</span>
                    </div>
                </li>
            @empty
                {{-- Pesan Reusable jika tidak ditemukan --}}
                <li class="list-group-item border-0 py-4 text-center">
                    <div class="text-muted">
                        <i class="bi bi-search-heart d-block mb-2 fs-4"></i>
                        <span class="d-block small">
                            Pencarian {{ strtolower($label) }} "<strong>{{ $query }}</strong>" tidak ditemukan.
                        </span>
                    </div>
                </li>
            @endforelse
        </ul>
    @endif
</div>