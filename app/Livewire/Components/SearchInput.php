<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SearchInput extends Component
{
    public $query = '';
    public $results = [];

    public $model;
    public $column;
    public $placeholder;
    public $label;
    public $limit;

    public function mount($model, $column = 'name', $placeholder = 'Search...', $label = 'Data', $limit = 5) {
        $this->model = $model;
        $this->column = $column;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->limit = $limit;
    }

    public function updatedQuery()
    {
        if (strlen($this->query) < 2) {
            $this->results = [];
            $this->dispatch('search-updated', query: $this->query);
            return;
        }

        if (!class_exists($this->model)) {
            $this->results = [];
            return;
        }

        try {
            // PERBAIKAN: Tambahkan 'slug' di select agar bisa diambil nilainya
            $this->results = $this->model::where($this->column, 'like', '%' . $this->query . '%')
                ->select(['id', $this->column, 'slug']) 
                ->limit($this->limit)
                ->get()
                ->toArray();
        } catch (\Exception $e) {
            $this->results = [];
        }

        $this->dispatch('search-updated', query: $this->query);
    }

    public function selectResult($id)
    {
        // Cari data berdasarkan ID
        $selected = $this->model::find($id);

        if ($selected) {
            // PERBAIKAN: Gunakan route name 'detail-article' dan kirim parameter 'slug'
            // Ini akan menghasilkan URL: /detail-article/judul-artikel-anda
            return redirect()->route('detail-article', ['slug' => $selected->slug]);
        }
    }

    public function clear()
    {
        $this->reset(['query', 'results']);
        $this->dispatch('search-updated', query: '');
    }

    public function render()
    {
        return view('livewire.components.search-input');
    }
}