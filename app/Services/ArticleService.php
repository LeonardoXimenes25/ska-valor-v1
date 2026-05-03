<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleService 
{
    // retrieve all data form article model
    public function getAllArticles()
    {
        return Article::with('articleCategory')
            ->latest()
            ->paginate(4);
    }

    // retrieve data by slug
    public function getArticleBySlug($slug)
    {
        return Article::where('slug', $slug)->firstOrFail();
    }

    // latest article post
    public function topArticles()
    {
        return Article::with('articleCategory')
            ->where('status', 'published')
            ->orderBy('views', 'desc')
            ->take(4)
            ->get();
    }

    public function categories(){
        return ArticleCategory::all();
        
    }
}