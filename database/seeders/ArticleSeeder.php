<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ArticleCategory::all();

        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Please seed categories first.');
            return;
        }

        for ($i = 1; $i <= 20; $i++) {

            $category = $categories->random();

            Article::create([
                'category_id'   => $category->id,
                'title'         => "Sample Article $i in {$category->name}",
                'slug'          => Str::slug("Sample Article $i in {$category->name}") . '-' . $i,
                'excerpt'       => "This is a short excerpt for article $i about {$category->name}.",
                'content'       => "<p>This is full content of article $i. You can replace this with real HTML content.</p>",
                'image'         => 'articles/sample.jpg',
                'status'        => 'published',
                'published_at'  => now()->subDays(rand(0, 30)),
                'views'         => rand(10, 1000),
            ]);
        }
    }
}
