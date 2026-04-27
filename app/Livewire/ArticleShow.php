<?php

namespace App\Livewire;

use App\Services\ArticleService;
use Livewire\Component;

class ArticleShow extends Component
{
    public $article;

    public function mount($slug, ArticleService $articleService)
    {
        $this->article = $articleService::getArticleBySlug($slug);
    }
    
    public function render()
    {
        return view('livewire.article-show');
    }
}
