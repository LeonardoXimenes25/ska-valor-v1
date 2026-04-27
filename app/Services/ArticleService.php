<?php

namespace App\Services;

use App\Models\Article;

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
}