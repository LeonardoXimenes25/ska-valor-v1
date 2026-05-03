<div class="search-bar shadow-sm position-relative">
    <i class="bi bi-search text-muted"></i>

    <input 
        type="text" 
        wire:model.live="query"
        placeholder="{{ $placeholder }}"
        class="form-control">

    @if(!empty($results))
        <div class="list-group position-absolute w-100 mt-1">
            @foreach($results as $result)
                <div class="list-group-item">
                    {{ $result->{$column} }}
                </div>
            @endforeach
        </div>
    @endif
</div>