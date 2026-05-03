<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SearchInput extends Component
{
    public $query;
    public $results = [];

    public $model;
    public $column = 'name';
    public $placeholder = 'Search...';

    public function mount($model, $column = 'name', $placeholder = 'Search...')
    {
        $this->model = $model;
        $this->column = $column;
        $this->placeholder = $placeholder;
    }

    public function updatedQuery()
    {
        if (!$this->model) return;

        $this->results = app($this->model)::where(
                $this->column,
                'like',
                '%' . $this->query . '%'
            )
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.components.search-input');
    }
}