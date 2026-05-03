<?php

namespace App\Livewire\Article;

use App\Services\ArticleService;
use Livewire\Component;

class ArticleDetail extends Component
{
    public $article;

    public function mount(ArticleService $articleService, $slug){
        $this->article = $articleService->getArticleBySlug($slug);
    }
    
    public function render(ArticleService $articleService)
    {
        return view('livewire.article.article-detail', [
            'article' => $this->article,
            'topArticles' => $articleService->topArticles(),
        ]);
    }
}
