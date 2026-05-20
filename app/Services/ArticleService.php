<?php

namespace App\Services;

use App\Models\Article;
use App\Models\ArticleCategory;

class ArticleService 
{
    // retrieve all data form article model
    public function getAllArticles($search = null)
    {
        return Article::with('articleCategory')
            ->when($search, function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(8);
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