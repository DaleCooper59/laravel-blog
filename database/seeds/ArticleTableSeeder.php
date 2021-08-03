<?php

use App\Models\Article;
use Illuminate\Database\Seeder;
use App\Models\Category;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::lists()->toArray();
        factory(App\Models\Article::class, 5)->create();

        // Populate the pivot table
        Article::all()->each(function ($articles) use ($category) {
            $oneCategory = array_rand($category, 1);

            $articles->categories()->sync($oneCategory === 0 ? 1 : $oneCategory);
        });
    }
}
