<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'category_id',
    'title',
    'slug',
    'excerpt',
    'content',
    'image',
    'status',
    'published_at',
    'views'
])]

class Article extends Model
{
    use softDeletes;

    public function articleCategory(): BelongsTo
    {
        return $this->belongsto(ArticleCategory::class, 'category_id');
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'date',
        ];
    }
}
