<?php

namespace App\Livewire\Article;

use App\Services\ArticleService;
use Livewire\Component;

class ArticleDetail extends Component
{
    public $article;
    protected $articleService;

    public function boot(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function mount($slug)
    {
        $this->article = $this->articleService->getArticleBySlug($slug);
    }
    
    public function render()
    {
        return view('livewire.article.article-detail');
    }
}
