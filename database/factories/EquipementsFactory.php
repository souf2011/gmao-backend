<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Emplacements;
use App\Models\Equipements;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipementsFactory extends Factory
{
    protected $model = Equipements::class;

    public function definition()
    {
        return [
            'Code_Equipement' => $this->faker->unique()->word(),
            'Nom_Equipement' => $this->faker->unique()->word() . ' ' . $this->faker->company() . ' ' . $this->faker->word(),
            'N_Serie' => $this->faker->word(),
            'Marque' => $this->faker->company(),
            'Categorie_id' => Categories::inRandomOrder()->first()->id,
            'Emplacement_id' => Emplacements::inRandomOrder()->first()->id,
            'Compteur' => $this->faker->randomNumber(),
            'Status' => $this->faker->randomElement(['disponible', 'non disponible']),
            'Type_Moteur' => $this->faker->word(),
            'Matricule' => $this->faker->word(),
            'Modele_Equipement' => $this->faker->word(),
            'Operateur' => $this->faker->name(),
            'Fin_Garantie' => $this->faker->date(),
            'Prix_Acquisition' => $this->faker->randomFloat(2, 1000, 10000),
            'Date_Acquisition' => $this->faker->date(),
            'Prix_Location' => $this->faker->randomFloat(2, 100, 1000),
            'Prochaine_Vidange' => $this->faker->date(),
            'Nom_Fichier' => $this->faker->word(),
            'Commentaire' => $this->faker->text(),
            'Image_Equipement' => $this->faker->imageUrl(),
        ];
    }
}
