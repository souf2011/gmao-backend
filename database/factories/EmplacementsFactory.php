<?php

namespace Database\Factories;

use App\Models\Emplacements;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmplacementsFactory extends Factory
{
    protected $model = Emplacements::class;

    public function definition()
    {
        return [
            'nom_emplacement' => $this->faker->company . ' ' . $this->faker->word,
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
