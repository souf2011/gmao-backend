<?php

namespace Database\Factories;

use App\Models\Intervenants;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntervenantsFactory extends Factory
{
    protected $model = Intervenants::class;

    // database/factories/IntervenantsFactory.php
    public function definition()
    {
        return [
            'Nom_intervenant' => $this->faker->name,
            'Date_Naissance' => $this->faker->date(),
            'Telephone' => $this->faker->phoneNumber,
            'Email' => $this->faker->safeEmail,
            'Genre' => $this->faker->randomElement(['Homme', 'Femme']),
            'Poste' => $this->faker->jobTitle,
            'CIN' => strtoupper($this->faker->bothify('??#####')),
            'DateEmbauche' => $this->faker->date(),
            'Service' => $this->faker->word(),
            'TypeFichier' => 'pdf',
            'Image' => 'default.jpg',
            'Fichier' => 'cv.pdf',
            // 'Nom_Fichier' => 'cv.pdf', ← SUPPRIMER CETTE LIGNE
        ];
    }
}
