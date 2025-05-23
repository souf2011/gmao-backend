<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends Factory
{
    protected $model = Categories::class; // Spécifie le modèle lié à cette factory

    public function definition()
    {
        return [
            'categorie_name' => $this->faker->word(), // Génère un nom de catégorie
            'categorie_description' => $this->faker->sentence(), // Génère une description de catégorie
            'categorie_image' => 'image_fx_' . $this->faker->numberBetween(1, 10) . '.jpg', // Génère un nom d'image
        ];
    }
}
