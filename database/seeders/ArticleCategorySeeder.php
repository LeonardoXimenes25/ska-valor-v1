<?php

namespace Database\Seeders;

use App\Models\ArticleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Komputer',
            'Inggris',
            'Jepang',
            'Korea',
            'Ekivalensia',
        ];

        foreach ($categories as $category) {
            ArticleCategory::firstOrCreate(
                ['slug' => Str::slug($category)],
                ['name' => $category]
            );
        }
    }
}
