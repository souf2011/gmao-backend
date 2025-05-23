<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        Categories::factory(12)->create(); // Crée 12 catégories avec la factory
    }
}
