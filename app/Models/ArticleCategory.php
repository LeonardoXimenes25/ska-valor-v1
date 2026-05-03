<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug', 'description'])]

class ArticleCategory extends Model
{
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id');
    }
    
    public function getColorClassAttribute()
    {
        return match ($this->slug) {
            'komputer' => 'primary',
            'inggris' => 'success',
            'jepang' => 'danger',
            'korea' => 'info',
            'ekivalensia' => 'warning',
            default => 'secondary',
        };
    }
}
