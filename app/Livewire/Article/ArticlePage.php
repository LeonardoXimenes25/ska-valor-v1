<?php

namespace App\Livewire\Article;

use App\Services\ArticleService;
use Livewire\Component;

class ArticlePage extends Component
{
    protected $articleService;

    public function boot(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function render()
    {
        $articles = $this->articleService->getAllArticles();
        return view('livewire.article.article-page', compact('articles'))
            ->layout('layouts.app');
    }
}
