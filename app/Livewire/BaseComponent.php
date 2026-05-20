<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

abstract class BaseComponent extends Component
{
    use WithPagination;

    // Otomatis semua tabel pakai desain yang sama
    public function paginationView()
    {
        return 'livewire.components.pagination-links';
    }
}