<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable(['name', 'slug', 'description'])]

class ProgramCategory extends Model
{
    // relation with program table
    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    // relation with module table
    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'program_category_id');
    }

    // generate otomatis slug url
    protected static function booted()
    {
        static::saving(function ($programCategory) {
            // Mengisi slug secara otomatis saat 'title' berubah
            if (empty($programCategory->slug) || $programCategory->isDirty('title')) {
                $programCategory->slug = Str::slug($programCategory->title);
            }
        });
    }

    // Memberitahu Laravel untuk mencari data berdasarkan slug secara default
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
