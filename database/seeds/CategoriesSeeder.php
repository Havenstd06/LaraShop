<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::Create([
            'name' => 'High Tech',
            'slug' => 'high-tech'
        ]);

        Category::Create([
            'name' => 'Books',
            'slug' => 'books'
        ]);

        Category::Create([
            'name' => 'Furniture',
            'slug' => 'furniture'
        ]);

        Category::Create([
            'name' => 'Games',
            'slug' => 'games'
        ]);

        Category::Create([
            'name' => 'Foods',
            'slug' => 'foods'
        ]);
    }
}
