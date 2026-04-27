<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;

class ArticleController extends Controller
{
    protected ArticleService $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    
    }

    public function index()
    {
        $articles = $this->articleService->getAllArticles();
        return view('pages.articles.post', compact('articles'));
    }

    public function show($slug)
    {
        $article = $this->articleService->getArticleBySlug($slug);
        return view('pages.articles.detail-article', compact('article'));
    }
}
