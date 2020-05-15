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
            'name' => 'Livres',
            'slug' => 'livres'
        ]);

        Category::Create([
            'name' => 'Meubles',
            'slug' => 'meubles'
        ]);

        Category::Create([
            'name' => 'Jeux',
            'slug' => 'jeux'
        ]);

        Category::Create([
            'name' => 'Nourritures',
            'slug' => 'nourritures'
        ]);
    }
}
