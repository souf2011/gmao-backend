<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'nom_service' => $this->faker->word,  
            'description' => $this->faker->sentence, 
        ];
    }
}
