<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Services\ArticleService;
use Livewire\Component;

class ArticleIndex extends Component
{
    // mengunakan pagination
    use WithPagination;

    // mengunakan Service di dalam render


    public function render(ArticleService $articleService)
    {
        return view('livewire.article-index', [
            'articles' => $articleService->getAllArticles()
        ])->layout('layouts.app');
    }
}
