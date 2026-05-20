<?php

namespace App\Livewire\Article;

use App\Livewire\BaseComponent;
use App\Services\ArticleService;
use Livewire\WithPagination;

class ArticlePage extends BaseComponent
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // penting kalau pakai bootstrap

    public function render(ArticleService $articleService)
    {
        return view('livewire.article.article-page', [
            'articles' => $articleService->getAllArticles(),
            'categories' => $articleService->categories(),
        ])->layout('layouts.app');
    }
}
