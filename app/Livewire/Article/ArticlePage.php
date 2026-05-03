<?php

namespace App\Livewire\Article;

use App\Services\ArticleService;
use Livewire\Component;

class ArticlePage extends Component
{
    public function render(ArticleService $articleService)
    {
    return view('livewire.article.article-page', [
        'articles' => $articleService->getAllArticles(),
        'categories' => $articleService->categories(),
    ])->layout('layouts.app');
    }
}
