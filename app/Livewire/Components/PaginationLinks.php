<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Livewire\WithPagination;

class PaginationLinks extends Component
{
    use WithPagination;

    // Nama method ini WAJIB sama untuk memberitahu Livewire menggunakan view buatan kita
    public function paginationView()
    {
        return 'livewire.components.pagination-links';
    }
    
    public function render()
    {
        return view('livewire.components.pagination-links');
    }
}
